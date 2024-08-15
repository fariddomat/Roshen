<?php

namespace App\Http\Controllers\Home;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Apartment;
use App\Models\Category;
use App\Models\Privacy;
use App\Models\ProfileDownload;
use App\Models\Project;
use App\Models\Promoter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    //
    public function index()
    {

        $projects = Project::latest()->limit(4)->get();
        $category_list=Category::limit(3)->get(['id','name']);
        $max_price=Apartment::max('price');
        $max_room_count=Apartment::max('room_count');
        $max_area=Apartment::max('area');
        $about=About::first();

        $count = Project::count();
        return view('home.index', compact('projects', 'count', 'category_list', 'max_price', 'max_room_count', 'max_area', 'about'));
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->back();
    }

    public function contactPage()
    {
        return view('home.contact');
    }

    public function promoters(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:promoters,email,'
        ]);

        Promoter::create([
            'name' => $request->email,
            'email' => $request->email,

        ]);

        return redirect()->back();
    }

    public function profileDownload()
    {
        $counter = ProfileDownload::find(1);
        if ($counter) {
            $counter->count = $counter->count + 1;
            $counter->save();
        } else {
            ProfileDownload::create([
                'id' => '1',
                'count' => '1'
            ]);
        }
        $file = public_path() . "/download/profile.pdf";
        if (file_exists($file)) {
            $headers = array(
                'Content-Type: application/pdf',
            );
            return Response::download($file, 'profile.pdf', $headers);
        }
    }

    public function updates(){

        $categories=Category::with('projects')->get();
        return view('home.updates', compact('categories'));
    }

    public function privacy(){
        $privacies=Privacy::orderBy('id')->get();
        return view('home.privacy', compact('privacies'));
    }
}
