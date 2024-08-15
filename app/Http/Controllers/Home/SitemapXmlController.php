<?php

namespace App\Http\Controllers\Home;

use anlutro\LaravelSettings\Facades\Setting;
// use anlutro\LaravelSettings\Facade as Setting;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\Request;

class SitemapXmlController extends Controller
{
    public function index()
    {
        $settings = Setting::get('site_about');
        // dd($settings);
        $categories = Category::all();
        $projects = Project::all();
        $about = About::first();


        return response()->view('home.sitemap', [
            'settings'=> $settings,
            'categories' => $categories,
            'projects' => $projects,
            'about' => $about,
        ])->header('Content-Type', 'text/xml')
            ->header('charset', 'utf-8');
    }
}
