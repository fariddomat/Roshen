<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Partners;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        
        $about=About::first()?:'';
        $partners = Partners::all();
        return view('home.about', compact('about', 'partners'));
    }
}
