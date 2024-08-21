<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Category;
use App\Models\Counter;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {

        $services = Service::orderBy('id')->get();

        $counters = Counter::all();
        return view('home.services', compact('services', 'counters'));
    }

    public function show($id)
    {

        $services = Service::orderBy('id')->get();
        $service = Service::find($id);

        if ($service) {

        $counters = Counter::all();
            return view('home.service', compact('service', 'services'));
        } else {
            # code...
            abort(404);
        }
    }
}
