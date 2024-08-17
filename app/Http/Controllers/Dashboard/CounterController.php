<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $counters = Counter::all();
        return view('dashboard.counters.index', compact('counters'));
    }

    public function create()
    {
        return view('dashboard.counters.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'icon'=>'required',
            'value'=>'required',
        ]);
        Counter::create($request->all());
        session()->flash('success', 'Counter Added Successfully');
        return redirect()->route('dashboard.counters.index');
    }
    public function edit(Counter $counter)
    {
        return view('dashboard.counters.edit', compact('counter'));
    }

    public function update(Request $request, Counter $counter)
    {

        $request->validate([
            'name'=>'required',
            'icon'=>'required',
            'value'=>'required',
        ]);
        $counter->update($request->all());
        session()->flash('success', 'Counter Updated Successfully');
        return redirect()->route('dashboard.counters.index');
    }
    public function destroy(Counter $counter)
    {
        $counter->delete();
        session()->flash('success', 'Counter Deleted Successfully');
        return redirect()->route('dashboard.counters.index');
    }




}
