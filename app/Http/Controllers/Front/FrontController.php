<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ApplyNowContent;
use App\Models\ExpendInfluence;
use App\Models\Faq;
use App\Models\HomePageContent;
use App\Models\OurModels;
use App\Models\OurResult;
use App\Models\OurWork;
use App\Models\Services;
use App\Models\ApplyData;
use App\Models\User;
use App\Models\Testimonial;
use App\Models\EmailUpdate;
use App\Models\SocialPlatforms;
use Illuminate\Http\Request;
use App\Mail\ApplyMail;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('faq_order', 'asc')->where('status',1)->get();
        $testimonials = Testimonial::where('status',1)->get();
        $services = Services::first();
        $allModels = OurModels::where('status',1)->get();
        $results = OurResult::first();
        $works = OurWork::first();
        $homecontent = HomePageContent::first();
        $influence_sec = ExpendInfluence::first();
        $platform_sec = SocialPlatforms::first();
        return view('front.home.index',compact('faqs','testimonials','services','allModels','results','homecontent','influence_sec','works','platform_sec'));
    }

    public function applyNow()
    {
        $applyNow = ApplyNowContent::first();
        return view('front.apply_now.index',compact('applyNow'));
    }

    public function Sendmail(Request $request)
    {
        $contact_method = $request->contactmethod;
        $newRecord = new ApplyData();
        $newRecord->apply_for = $request->application;
        $newRecord->name = $request->name;
        $newRecord->email = $request->email;
        if($request->contactmethod == 'cemail') {
            $newRecord->contact_method = 'email';
        } else {
            $newRecord->contact_method = $request->contactmethod;
        }
        $newRecord->contact = $request->$contact_method;
        $newRecord->social_media_account = $request->instaaccount;
        $newRecord->able_to_tarvel = $request->travel;
        $newRecord->save();
        $mailData = $newRecord->toArray();
        $user =  User::where('is_admin',1)->first();
        Mail::to($user->email)->send(new ApplyMail($mailData));

        return response()->json(true);
    }

    public function Checkmail(Request $request)
    {
        // return $request->email;
        if($request->email) {
            if($request->validatefor == 'apply') {
                $record = ApplyData::where('email',$request->email)->first();
                if(!$record) {
                    return response()->json(['success' => true]);
                } else {
                    return response()->json(['success' => false]);
                }
            } 

        }
        return response()->json(false);
    }

    public function subscribe(Request $request) 
    {
        $email = $request->email;
        if($email) {
            $record = EmailUpdate::where('email',$email)->first();
            if(!$record) {
                $record = new EmailUpdate();
                $record->email = $email;
                $record->save();

                return response()->json(['success' =>true,'msg' => 'Thanks for subscribe']);
            } else {
                return response()->json(['success' =>false,'msg' => 'Email already registered']);
            }
        } else {
            return response()->json(['success' =>false,'msg' => 'something went wrong']);
        }
    }
}
