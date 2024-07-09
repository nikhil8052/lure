<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageContent;
use App\Models\OurModels;
use App\Models\OurResult;
use App\Models\Services;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class SiteContentController extends Controller
{

    public function homePage()
    {
        $homeContent = HomePageContent::first();
        return view('admin.site-content.home_page.home',compact('homeContent'));
    }

    public function homeContentUpdate(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die();
        $homeContent = HomePageContent::first();
        if(!$homeContent) {
            $homeContent = new HomePageContent();
        }


        switch ($request->type) {
            case 'joinus':
                $homeContent->join_us_heading = $request->joinus_heading;
                $homeContent->join_us_text = $request->joinus_text;
                
                if ($request->hasFile('joinus_image')) {
                    $file = $request->file('joinus_image');
                    $filename = 'img_' . time() . '.' . $file->extension();
                    $file->move(public_path() . '/lure/images/', $filename);
                }
                
                $homeContent->join_us_image = $filename ?? $homeContent->join_us_image;
                break;
        
            case 'expertpicks':
                $homeContent->expertpicks_heading = $request->expertPicks_heading;
                
                $filenames = [];
                $count = 1;
                foreach ($request->logos as $data) {
                    if ($data->isValid()) {
                        $file = $data;
                        $filename = 'img_' . $count . time() . '.' . $file->extension();
                        $file->move(public_path() . '/lure/images/', $filename);
                        $filenames[$filename] = $filename;
                    }
                    $count++;
                }
                
                $previouslogo = json_decode($homeContent->expertpicks_logos, true) ?? [];
                $mergedLogos = array_merge($previouslogo, $filenames);
                $homeContent->expertpicks_logos = json_encode($mergedLogos);
                break;
        
            case 'banner':
                $homeContent->bannerSec_heading = $request->banner_title;
                $homeContent->bannerSec_text = $request->banner_text;
                
                if ($request->hasFile('banner_logo')) {
                    $file = $request->file('banner_logo');
                    $filename_logo = 'img_' . time() . '.' . $file->extension();
                    $file->move(public_path() . '/lure/images/', $filename_logo);
                }
                
                $homeContent->bannerSec_logo = $filename_logo ?? $homeContent->bannerSec_logo;
        
                if ($request->hasFile('bg_image')) {
                    $bgfile = $request->file('bg_image');
                    $filename_bg = 'imgbg_' . time() . '.' . $bgfile->extension();
                    $bgfile->move(public_path() . '/lure/images/', $filename_bg);
                }
                
                $homeContent->bannerSec_bgimage = $filename_bg ?? $homeContent->bannerSec_bgimage;
        
                if ($request->hasFile('bg_video')) {
                    $videofile = $request->file('bg_video');
                    $filename_video = 'video_' . time() . '.' . $videofile->extension();
                    $videofile->move(public_path('lure/images'), $filename_video);
                }
                
                $homeContent->bannerSec_video = $filename_video ?? $homeContent->bannerSec_video;
                break;

            case 'aboutus':
                $homeContent->aboutSec_activeheading = json_encode($request->active_heading);
                $homeContent->aboutSec_subheading = $request->about_us_sub_heading;
                $homeContent->aboutSec_text = $request->aboutus_text;
                
                break;
        
            default:
                // Handle other types or provide a default behavior
                break;
        }
        $homeContent->save();
        return redirect()->back()->with('success','Data Updated Successfully');
    }

    public function removelogo(Request $request) 
    {
        $homeContent = HomePageContent::first();
        $imageIndex = $request->imageIndex;
        if(!$imageIndex) {
            return response()->json(false);
        } else {
            if(isset($homeContent->expertpicks_logos) && $homeContent->expertpicks_logos != null && !empty(json_decode($homeContent->expertpicks_logos))) {
                $logos = json_decode($homeContent->expertpicks_logos, true);
                if(isset($logos[$imageIndex])) {
                    unset($logos[$imageIndex]);
                }
                $homeContent->expertpicks_logos = json_encode($logos);
                $homeContent->save();
    
                return response()->json(true);
            } else {
                return response()->json(false);
            }
        }
    }
    public function services()
    {
        $services = Services::first();
        return view('admin.services.services',compact('services'));
    }

    public function addServices(Request $request)
    {
        $services = Services::first();
        if(!$services) {
            $services = new Services();
        }
        $services->title = $request->title;
        $services->services = json_encode($request->service);
        $services->save();

        return redirect()->back()->with('success','Data Updated Successfully');
    }

    public function models()
    {
        // $allModels = OurModels::where('status',1)->get();
        $allModels = OurModels::all();
        return view('admin.models.index',compact('allModels'));
    }

    public function AddModels(Request $request) 
    {   
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->with('error',  $validator);
        }
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename ='Model_' . time() . '.' . $file->extension();
            $file->move(public_path() . '/Models_Images/', $filename);

            $model = new OurModels();
            $model->image = $filename;
            $model->save();

            return redirect()->back()->with('success','Data Added Successfully');
        } else {
            return redirect()->back()->with('error','Something went Wrong');
        }   
    }

    public function ModelRemove($id)
    {
        if(!$id) {
            return redirect()->back()->with('error','Something Went worng');
        } 
        $model = OurModels::find($id);
        if(!$model) {
            return redirect()->back()->with('error','Something Went worng');
        } else {
            $model->delete();
            return redirect()->back()->with('success','Data Removed Successfully');
        }
    }

    public function changeModelStatus($id)
    {
        $data = OurModels::find($id);
        if($data) {
            $data->status = !$data->status;
            $data->save();
            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }


    public function results()
    {
        $results = OurResult::first();
        return view('admin.our_results.index',compact('results'));
    }

    public function addresults(Request $request)
    {

        // echo "<pre>";
        // print_r($request->all());
        // die();

        $results = OurResult::first();
        if(!$results) {
            $results = new OurResult();
        }
        $results->title = $request->title;
        // $results->results = json_encode($request->result);

        $result_array = [];
        foreach($request->result as $data) {
            if(isset($data['image']) && $data['image']->isValid()) {
                $file = $data['image'];
                $filename ='Model_' . time() . '.' . $file->extension();
                $file->move(public_path() . '/Our_result/', $filename);

            } else if(isset($data['imageVal']) && $data['imageVal'] != null) {
                $filename = $data['imageVal'];
            } else {
                $filename = null;
            }
            if(isset($filename) && $filename !=  null) {
                $result_array[] = [
                    'heading' => $data['heading'],
                    'image' => $filename,
                    'description' => $data['description']
                ];
            }
        }

        $results->results = json_encode($result_array);
        $results->save();

        return redirect()->back()->with('success','Data Updated Successfully');
    }
}
