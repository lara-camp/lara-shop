<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendIndexController extends Controller
{
    public function frontendIndex() {
        return view('frontend.layouts.partial.index');
    }
    public function category() {
        return view('frontend.layouts.partial.category');
    }
    public function blog() {
        return view('frontend.layouts.partial.blog');
    }
    public function tracking() {
        return view('frontend.layouts.partial.tracking');
    }
    public function contact() {
        return view('frontend.layouts.partial.contact');
    }
}
