<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Redirect;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index()
    {
        $redirects = Redirect::all();
        return view('dashboard.redirects.index', compact('redirects'));
    }

    public function create()
    {
        return view('dashboard.redirects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'source_url' => 'required|unique:redirects,source_url',
            'destination_url' => 'required|url',
            'status_code' => 'required|integer',
        ]);

        Redirect::create($request->all());
        return redirect()->route('dashboard.redirects.index')->with('success', 'Redirect added successfully.');
    }

    public function edit($id)
    {
        $redirect = Redirect::findOrFail($id);
        return view('dashboard.redirects.edit', compact('redirect'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'source_url' => 'required|unique:redirects,source_url,' . $id,
            'destination_url' => 'required|url',
            'status_code' => 'required|integer',
        ]);

        $redirect = Redirect::findOrFail($id);
        $redirect->update($request->all());
        return redirect()->route('dashboard.redirects.index')->with('success', 'Redirect updated successfully.');
    }

    public function destroy($id)
    {
        $redirect = Redirect::findOrFail($id);
        $redirect->delete();
        return redirect()->route('dashboard.redirects.index')->with('success', 'Redirect deleted successfully.');
    }
}
