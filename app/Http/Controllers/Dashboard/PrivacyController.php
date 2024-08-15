<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{

    public function index()
    {
        $privacies = Privacy::orderBy('id')->get();
        return view('dashboard.privacies.index', compact('privacies'));
    }

    public function create()
    {
        return view('dashboard.privacies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        Privacy::create($request->all());

        return redirect()->route('dashboard.privacies.index')
            ->with('success', 'Privacy policy created successfully');
    }

    public function show(Privacy $privacy)
    {
        return view('dashboard.privacies.show', compact('privacy'));
    }

    public function edit(Privacy $privacy)
    {
        return view('dashboard.privacies.edit', compact('privacy'));
    }

    public function update(Request $request, Privacy $privacy)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $privacy->update($request->all());

        return redirect()->route('dashboard.privacies.index')
            ->with('success', 'Privacy policy updated successfully');
    }

    public function destroy(Privacy $privacy)
    {
        $privacy->delete();

        return redirect()->route('dashboard.privacies.index')
            ->with('success', 'Privacy policy deleted successfully');
    }
}
