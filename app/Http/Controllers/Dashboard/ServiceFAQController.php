<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceFAQ;
use Illuminate\Http\Request;

class ServiceFAQController extends Controller
{
    public function index()
    {
        $faqs = ServiceFAQ::with('service')->paginate(10);
        return view('dashboard.service_faqs.index', compact('faqs'));
    }

    public function create()
    {
        $services = Service::all();
        return view('dashboard.service_faqs.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        ServiceFAQ::create($request->all());

        return redirect()->route('dashboard.service-faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit($id)
    {
        $serviceFAQ=ServiceFAQ::findOrFail($id);
        $services = Service::all();
        return view('dashboard.service_faqs.edit', compact('serviceFAQ', 'services'));
    }

    public function update(Request $request, $id)
    {

        $serviceFAQ=ServiceFAQ::findOrFail($id);
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $serviceFAQ->update($request->all());

        return redirect()->route('dashboard.service-faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy($id)
    {

        $serviceFAQ=ServiceFAQ::findOrFail($id);
        $serviceFAQ->delete();
        return redirect()->route('dashboard.service-faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
