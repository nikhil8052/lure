<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplyNowContent;
use App\Models\ExpendInfluence;
use App\Models\HomePageContent;
use App\Models\OurModels;
use App\Models\OurResult;
use App\Models\OurWork;
use App\Models\SocialPlatforms;
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
                    $filename = 'img_'.rand() . time() . '.' . $file->extension();
                    $file->move(public_path() . '/lure/images/', $filename);
                    $homeContent->join_us_image = $filename;
                }
                
               
                break;
        
            case 'expertpicks':
                $homeContent->expertpicks_heading = $request->expertPicks_heading;
                
                $filenames = [];
                $count = 1;
                foreach ($request->logos as $data) {
                    if ($data->isValid()) {
                        $file = $data;
                        $filename = 'img_'.rand() . $count . time() . '.' . $file->extension();
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
                    $filename_logo = 'img_'.rand() . time() . '.' . $file->extension();
                    $file->move(public_path() . '/lure/images/', $filename_logo);
                    $homeContent->bannerSec_logo = $filename_logo;
                }
                
                if ($request->hasFile('bg_image')) {
                    $bgfile = $request->file('bg_image');
                    $filename_bg = 'imgbg_'.rand() . time() . '.' . $bgfile->extension();
                    $bgfile->move(public_path() . '/lure/images/', $filename_bg);
                    $homeContent->bannerSec_bgimage = $filename_bg;
                }
                
                if ($request->hasFile('bg_video')) {
                    $videofile = $request->file('bg_video');
                    $filename_video = 'video_'.rand() . time() . '.' . $videofile->extension();
                    $videofile->move(public_path('lure/images'), $filename_video);
                    $homeContent->bannerSec_video = $filename_video;
                }
                
                break;

            case 'aboutus':
                $homeContent->aboutSec_activeheading = json_encode($request->active_heading);
                $homeContent->aboutSec_subheading = $request->about_us_sub_heading;
                $homeContent->aboutSec_text = $request->aboutus_text;
                
                break;
            
            case 'contentsec':
                $homeContent->contentSec_heading = $request->contentsec_heading;
                $homeContent->contentSec_text = $request->contentsec_text;
                
                if ($request->hasFile('contentsec_image')) {
                    $contfile = $request->file('contentsec_image');
                    $filename_cont = 'img_'.rand() . time() . '.' . $contfile->extension();
                    $contfile->move(public_path() . '/lure/images/', $filename_cont);
                    $homeContent->contentSec_image = $filename_cont;
                }
        
                if ($request->hasFile('contentsec_simage')) {
                    $contsfile = $request->file('contentsec_simage');
                    $filename_conts = 'imggirl_'.rand() . time() . '.' . $contsfile->extension();
                    $contsfile->move(public_path() . '/lure/images/', $filename_conts);
                    $homeContent->contentSec_simage = $filename_conts;
                }
                
                break;
        
            default:
                // Handle other types or provide a default behavior
                break;
        }
        $homeContent->save();
        return redirect()->back()->with('success','Data Updated Successfully');
    }

    public function ApplyNowPage()
    {
        $applyNow = ApplyNowContent::first();
        return view('admin.site-content.apply_now.apply',compact('applyNow')); 
    }

    public function ApplyNowPageUpdate(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die();

        $applyNow = ApplyNowContent::first();
        if(!$applyNow) {
            $applyNow = new ApplyNowContent();
        }

        $applyNow->heading  = $request->heading;
        $applyNow->sub_heading  = $request->sub_heading;
        $applyNow->submit_heading  = $request->submit_heading;
        $applyNow->submit_text  = $request->submit_text;

        if ($request->hasFile('bg_video')) {
            $bgfile = $request->file('bg_video');
            $filename_bg = 'vid_'.rand() . time() . '.' . $bgfile->extension();
            $bgfile->move(public_path() . '/lure/images/', $filename_bg);
            $applyNow->bg_video = $filename_bg;
        }

        if ($request->hasFile('submit_image')) {
            $giffile = $request->file('submit_image');
            $filename_gif = 'submit_'.rand() . time() . '.' . $giffile->extension();
            $giffile->move(public_path() . '/lure/images/', $filename_gif);
            $applyNow->submit_gif = $filename_gif;
        }
        $applyNow->save();

        return redirect()->back()->with('success','Data Updated Successfully');
    }

    public function InfluenceContent()
    {
        $influence_sec = ExpendInfluence::first();
        return view('admin.influence.expand_influence',compact('influence_sec'));
    }
    public function InfluenceContentUpdate(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die();
        $influence_sec = ExpendInfluence::first();
        if(!$influence_sec) {
            $influence_sec = new ExpendInfluence();
        }

        $influence_sec->heading = $request->influence_title;
        $influence_sec->text = $request->influence_text;

        if ($request->hasFile('before_video')) {
            $videobfile = $request->file('before_video');
            $filename_bvideo = 'video_before'.rand() . time() . '.' . $videobfile->extension();
            $videobfile->move(public_path('lure/images'), $filename_bvideo);
        }
        $influence_sec->video_before = $filename_bvideo ?? $influence_sec->video_before;

        if ($request->hasFile('after_video')) {
            $videoafile = $request->file('after_video');
            $filename_avideo = 'video_after'.rand() . time() . '.' . $videoafile->extension();
            $videoafile->move(public_path('lure/images'), $filename_avideo);
        }
        $influence_sec->video_after = $filename_avideo ?? $influence_sec->video_after;

        if ($request->hasFile('before_image')) {
            $beforefile = $request->file('before_image');
            $filename_bimg = 'img_before'.rand() . time() . '.' . $beforefile->extension();
            $beforefile->move(public_path('lure/images'), $filename_bimg);
        }
        $influence_sec->image_before = $filename_bimg ?? $influence_sec->image_before;

        if ($request->hasFile('after_image')) {
            $afterfile = $request->file('after_image');
            $filename_aimg = 'img_after'.rand() . time() . '.' . $afterfile->extension();
            $afterfile->move(public_path('lure/images'), $filename_aimg);
        }
        $influence_sec->image_after = $filename_aimg ?? $influence_sec->image_after;

        $influence_sec->save();
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
        // $allModels = OurModels::where('status',0)->get();
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
            $filename ='Model_'.rand() . time() . '.' . $file->extension();
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
            $results = new OurWork();
        }
        $results->title = $request->title;
        // $results->results = json_encode($request->result);

        $result_array = [];
        foreach($request->result as $data) {
            if(isset($data['image']) && $data['image']->isValid()) {
                $file = $data['image'];
                $filename ='img_'.rand() . time() . '.' . $file->extension();
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

    public function works()
    {
        $results = OurWork::first();
        // $results = null;
        return view('admin.our_works.index',compact('results'));
    }

    public function addworks(Request $request)
    {

        // echo "<pre>";
        // print_r($request->all());
        // die();

        $results = OurWork::first();
        if(!$results) {
            $results = new OurWork();
        }
        $results->title = $request->title;
        // $results->results = json_encode($request->result);

        $result_array = [];
        foreach($request->result as $data) {
            if(isset($data['image']) && $data['image']->isValid()) {
                $file = $data['image'];
                $filename ='img_' .rand(). time() . '.' . $file->extension();
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

        $results->works = json_encode($result_array);
        $results->save();

        return redirect()->back()->with('success','Data Updated Successfully');
    }

    public function Platforms()
    {
        $results = SocialPlatforms::first();
        return view('admin.platforms.index',compact('results'));
    }

    public function addPlatforms(Request $request)
    {

        // echo "<pre>";
        // print_r($request->all());
        // die();

        $record = SocialPlatforms::first();
        if(!$record) {
            $record = new SocialPlatforms();
        }
        $record->sec_title = $request->title;

        if($request->hasFile('sec_logo')) {
            $sec_logo = $request->file('sec_logo');
            $sec_logoname ='img_'.rand() . time() . '.' . $sec_logo->extension();
            $sec_logo->move(public_path() . '/Our_result/', $sec_logoname);

            $record->web_logo = $sec_logoname;
        }

        if($request->hasFile('result_image')) {
            $result_image = $request->file('result_image');
            $result_imagename ='img_'.rand() . time() . '.' . $result_image->extension();
            $result_image->move(public_path() . '/Our_result/', $result_imagename);
            
            $record->result_image = $result_imagename;
        }

        $result_array = [];
        foreach($request->platform as $data) {
            if(isset($data['image']) && $data['image']->isValid()) {
                $file = $data['image'];
                $filename ='img_' .rand(). time() . '.' . $file->extension();
                $file->move(public_path() . '/Our_result/', $filename);

            } else if(isset($data['imageVal']) && $data['imageVal'] != null) {
                $filename = $data['imageVal'];
            } else {
                $filename = null;
            }
            if(isset($filename) && $filename !=  null) {
                $result_array[] = [
                    'title' => $data['title'],
                    'image' => $filename,
                ];
            }
        }

        $record->platforms = json_encode($result_array);
        $record->save();

        return redirect()->back()->with('success','Data Updated Successfully');
    }
}
