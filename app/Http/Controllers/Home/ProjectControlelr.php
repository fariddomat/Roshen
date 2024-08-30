<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Category;
use App\Models\Facil;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectControlelr extends Controller
{
    //
    public function index(Request $request)
    {
        $category = (object)[
            'name' => 'كل التصنيفات'
        ];

        $query = Project::query();

        // تصفية المشاريع بناءً على الفئة
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category_id', $request->category);
            $category = Category::find($request->category);
        }

        // تصفية المشاريع بناءً على اتجاه الشقة
        if ($request->has('direction') && !empty($request->direction)) {
            // هنا تفترض وجود عمود في جدول المشاريع باسم `direction`
            $query->where('direction', $request->direction);
        }

        // تصفية المشاريع بناءً على حالة الشقة
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        // تصفية المشاريع بناءً على عدد الغرف
        if ($request->has('rooms') && !empty($request->rooms)) {
            // هنا تفترض وجود علاقة بين المشاريع والشقق
            $query->whereHas('apartments', function ($q) use ($request) {
                $q->where('room_count', $request->rooms);
            });
        }

        // تصفية المشاريع بناءً على عدد الحمامات
        if ($request->has('bathrooms') && !empty($request->bathrooms)) {
            $query->whereHas('apartments', function ($q) use ($request) {
                $q->where('bathroom_count', $request->bathrooms);
            });
        }

        // تصفية المشاريع بناءً على نطاق السعر
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereHas('apartments', function ($q) use ($request) {
            $q->whereBetween('price', [$request->min_price, $request->max_price]);
        });
        }

        $projects = $query->orderBy('created_at')->paginate(16);
        $categories = Category::all();

        return view('home.projects', compact('category', 'projects', 'categories'));
    }

    public function show($id)
    {

        $project = Project::find($id);

        if ($project) {
            if ($project->status == 'غير متاح للعرض') {
                abort(404);
            }

            $category_list = Category::all();
            $max_price = Apartment::max('price');
            $max_room_count = Apartment::max('room_count');
            $max_area = Apartment::max('area');

            $projects = Project::where('category_id', $project->category_id)->where('id', '<>', $id)->limit(6)->get();

            $facils = Facil::all();
            return view('home.project', compact('project', 'category_list', 'max_price', 'max_room_count', 'max_area', 'projects', 'facils'));
        } else {
            # code...
            abort(404);
        }
    }
}
