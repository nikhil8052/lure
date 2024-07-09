<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ExpendInfluence;
use App\Models\Faq;
use App\Models\HomePageContent;
use App\Models\OurModels;
use App\Models\OurResult;
use App\Models\Services;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('faq_order', 'asc')->where('status',1)->get();
        $testimonials = Testimonial::where('status',1)->get();
        $services = Services::first();
        $allModels = OurModels::where('status',1)->get();
        $results = OurResult::first();
        $homecontent = HomePageContent::first();
        $influence_sec = ExpendInfluence::first();
        return view('front.home.index',compact('faqs','testimonials','services','allModels','results','homecontent','influence_sec'));
    }

    public function applyNow()
    {
        return view('front.apply_now.index');
    }
}
