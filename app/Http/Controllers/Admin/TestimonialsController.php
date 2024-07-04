<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function index()
    {
        $faqs = [];
        return view('admin.testimonial.index',compact('faqs'));
    }
}
