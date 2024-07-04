<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqsController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('faq_order', 'asc')->get();
        return view('admin.faqs.faqs',compact('faqs'));
    }

    public function saveFaq(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'description' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'fields cannot be empty');
        }

        if($request->id != null){
            $faq = Faq::find($request->id);
            if($faq){
                $faq->question = $request->question;
                $faq->description = $request->description;
                $faq->save();
                return redirect()->back()->with('success','data updated successfully');
            } else {
                return redirect()->back()->with('error ','something went wrong');
            }
        } else {
            $faq = new Faq();
            $faq->question = $request->question;
            $faq->description = $request->description;
            $faq->save();
            return redirect()->back()->with('success','data added successfully');
        }
    }

    public function getRecord($id)
    {
        $data = Faq::find($id);
        return response()->json($data);
    }

    public function removeFaq($id)
    {
        $data = Faq::find($id);
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
            $faq = FAQ::find($id);
            if ($faq) {
                $faq->faq_order = $index + 1;
                $faq->save();
            }
        }
        return response()->json(['success' => true]);
    }

    public function changeStatus($id)
    {
        $data = Faq::find($id);
        if($data) {
            $data->status = !$data->status;
            $data->save();
            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }
}
