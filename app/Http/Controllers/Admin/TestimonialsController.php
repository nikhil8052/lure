<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('status',1)->get();
        return view('admin.testimonial.index',compact('testimonials'));
    }

    public function saveTestimonial(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'position' => 'required',
            'company' => 'required',
            'statement' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'fields cannot be empty');
        }

        if($request->id != null){
            $testimonial = Testimonial::find($request->id);
            if($testimonial){
                $testimonial->name = $request->name;
                $testimonial->position = $request->position;
                $testimonial->company_name = $request->company;
                $testimonial->description = $request->statement;
                if($request->hasFile('image')) {
                    $file = $request->file('image');
                    $filename ='client' . time() . '.' . $file->extension();
                    $file->move(public_path() . '/testimonials/', $filename);
                    $testimonial->image = $filename;
                }
                $testimonial->save();
                return redirect()->back()->with('success','data updated successfully');
            } else {
                return redirect()->back()->with('error ','something went wrong');
            }
        } else {
            $testimonial = new Testimonial();
            $testimonial->name = $request->name;
            $testimonial->position = $request->position;
            $testimonial->company_name = $request->company;
            $testimonial->description = $request->statement;
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $filename ='client' . time() . '.' . $file->extension();
                $file->move(public_path() . '/testimonials/', $filename);
                $testimonial->image = $filename;
            }
            $testimonial->save();
            return redirect()->back()->with('success','data added successfully');
        }
    }

    public function getRecord($id)
    {
        $data = Testimonial::find($id);
        return response()->json($data);
    }

    public function removeFaq($id)
    {
        $data = Testimonial::find($id);
        if($data){
            $data->delete();
            return redirect()->back()->with('success','record deleted successfully');
        } else {
            return redirect()->back()->with('error ','something went wrong');
        }
    }

    public function updateOrder(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            $testimonial = Testimonial::find($id);
            if ($testimonial) {
                $testimonial->order = $index + 1;
                $testimonial->save();
            }
        }
        return response()->json(['success' => true]);
    }

    public function changeStatus($id)
    {
        $data = Testimonial::find($id);
        if($data) {
            $data->status = !$data->status;
            $data->save();
            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }
}
