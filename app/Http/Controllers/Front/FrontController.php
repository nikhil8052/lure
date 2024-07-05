<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\OurModels;
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
        return view('front.dashboard.index',compact('faqs','testimonials','services','allModels'));
    }

    public function applyNow()
    {
        return view('front.apply_now.index');
    }
}
