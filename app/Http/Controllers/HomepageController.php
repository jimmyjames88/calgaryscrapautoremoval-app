<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class HomepageController extends Controller
{
    public function index()
	{
		$testimonials = Testimonial::orderBy('order')->get();
		return view('index', compact('testimonials'));
	}
}
