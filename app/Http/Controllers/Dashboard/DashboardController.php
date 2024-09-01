<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Contact;
use App\Models\LogSystem;
use App\Models\NewsLetter;
use App\Models\ProfileDownload;
use App\Models\Project;
use Illuminate\Http\Request;

use IlluminateSupportFacadesLog;

class DashboardController extends Controller
{

    public function index()
    {
        $categories = Category::count();
        $projects = Project::count();
        $apartments = Apartment::count();
        $contacts = Contact::count();
        $newsLetter = NewsLetter::count();

        // Pass the counts to the view
        return view('dashboard.index', compact('categories', 'projects', 'apartments', 'contacts', 'newsLetter'));
    }
}
