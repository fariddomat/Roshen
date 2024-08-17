<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Why;
use Illuminate\Http\Request;

class WhyController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $whies = Why::all();
        return view('dashboard.whies.index', compact('whies'));
    }

    public function create()
    {
        return view('dashboard.whies.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'icon'=>'required',
            'value'=>'required',
        ]);
        Why::create($request->all());
        session()->flash('success', 'Why Added Successfully');
        return redirect()->route('dashboard.whies.index');
    }
    public function edit(Why $why)
    {
        return view('dashboard.whies.edit', compact('why'));
    }

    public function update(Request $request, Why $why)
    {

        $request->validate([
            'name'=>'required',
            'icon'=>'required',
            'value'=>'required',
        ]);
        $why->update($request->all());
        session()->flash('success', 'Why Updated Successfully');
        return redirect()->route('dashboard.whies.index');
    }
    public function destroy(Why $why)
    {
        $why->delete();
        session()->flash('success', 'Why Deleted Successfully');
        return redirect()->route('dashboard.whies.index');
    }
}
