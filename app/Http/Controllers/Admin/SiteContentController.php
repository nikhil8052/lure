<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurModels;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteContentController extends Controller
{
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
}
