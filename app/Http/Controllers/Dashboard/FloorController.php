<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Apartment;
use App\Models\Floor;
use App\Http\Controllers\Controller;
use App\Models\LogSystem;
use App\Models\Project;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['role:superadministrator|Manager']);
    }

    public function index($id)
    {
        $project = Project::find($id);
        if (!$project) {
            abort(404);
        }
        $apartments = Apartment::where('project_id', $project->id)->where('appendix', '<>', 'on')->orderBy('type')->get();

        return view('dashboard.floors.index', compact('project', 'apartments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'counts' => 'required',
        ]);
        $project = Project::find($request->project_id);
        foreach ($request->counts as $key => $count) {
            for ($i = 0; $i < $count; $i++) {
                # code...
                Floor::create([
                    'project_id' => $project->id,
                    'apartment_id' => $request->apartment_id[$key],
                    'floor_id' => $request->floor_id[$key],
                    // 'apartment_count'=>$count,
                ]);
            }
        }
        LogSystem::success('تم اضافة الشقق - اسم المشروع : ' . $project->name);

        return redirect()->route('dashboard.apartments.index', 'projectId=' . $project->id);
        // dd($request->project_id);
    }

    public function show($id)
    {
        $project = Project::find($id);
        if (!$project) {
            abort(404);
        }
        $floors = Floor::where('project_id', $id)->get();
        // dd($floors);
        return view('dashboard.floors.show', compact('floors', 'project'));
    }

    public function update(Request $request)
    {
        $floor = Floor::find($request->id);
        $floor->update([
            'status' => $request->status
        ]);
        LogSystem::info(' تم تعديل حالة الشقة ' . $floor->apartment->type . '-' . $floor->apartment->code . ' في الطابق ' . $floor->floor_id . ' - اسم المشروع : ' . $floor->project->name);

        return redirect()->back();
    }

    public function destroy($id)
    {

        $floors = Floor::where('project_id', $id);
        $floor = Floor::where('project_id', $id)->first();
        LogSystem::error('تم تهيئة الشقق - اسم المشروع : ' . $floor->project->name);

        $floors->delete();

        return redirect()->back();
    }
}
