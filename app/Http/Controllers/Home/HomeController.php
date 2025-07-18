<?php

namespace App\Http\Controllers\Home;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Apartment;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Counter;
use App\Models\Facil;
use App\Models\NewsLetter;
use App\Models\Partners;
use App\Models\Privacy;
use App\Models\ProfileDownload;
use App\Models\Project;
use App\Models\Promoter;
use App\Models\Review;
use App\Models\Service;
use App\Models\Why;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Mail;
use Illuminate\Support\Facades\Http;
use App\Models\Role;
use App\Models\Terms;


class HomeController extends Controller
{
    //
    public function index()
    {
        // $hrRole = Role::create(['name' => 'Manager']);


        $projects = Project::latest()->limit(6)->get();
        $category_list = Category::limit(3)->get(['id', 'name']);
        $max_price = Apartment::max('price');
        $max_room_count = Apartment::max('room_count');
        $max_area = Apartment::max('area');
        $about = About::first() ?: '';
        $services = Service::orderBy('id')->get();

        $categories = Category::all();

        $count = Project::count();
        $counters = Counter::all();
        $partners = Partners::all();
        $certs = Certificate::all();
        $reviews = Review::all();
        $whies = Why::all();
        $facils = Facil::all();
        return view('home.index', compact('projects', 'count', 'category_list', 'max_price', 'max_room_count', 'max_area', 'about', 'services', 'counters', 'partners', 'certs', 'reviews', 'whies', 'facils', 'categories'));
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => [
                'required',
                'regex:/^05[0-9]{8}$/', // Start with 05 and exactly 10 digits in total
                'unique:contacts,phone',
            ],
            'message' => 'required',
        ], [
            'phone.regex' => 'يجب أن يبدأ رقم الهاتف بـ 05 وأن يتكون من 10 أرقام.', // Custom error message in Arabic
            'phone.unique' => 'رقم الهاتف موجود بالفعل في قاعدة البيانات.', // Custom error message for duplicate phone numbers

        ]);


        // حفظ البيانات في قاعدة البيانات
        Contact::create($request->all());

        // البحث عن الخدمة باستخدام ID
        $service = Service::find($request->service_id);

        // إعداد بيانات البريد الإلكتروني
        $info = [
            'name' => $request->name,
            'email' => $request->email ?? 'غير متوفر', // التحقق من وجود البريد الإلكتروني
            'phone' => $request->phone,
            'service' => $service ? $service->name : 'غير متوفر',
            'data' => $request->message,
        ];



        $response = Http::get('https://crm.roshem.sa/cron/api_insert', [
            'name' => $request->name,
            'phonenumber' => $request->phone,
            'email' => $request->email ?? 'غير متوفر',
            'description' => $request->message,
            'service' => $service ? $service->id : ''
        ]);




        // إرسال البريد الإلكتروني
        try {
            Mail::send('mail', $info, function ($message) {
                $message->to("info@roshem.sa", "Roshem Info")
                    ->subject('New Contact Order');
                $message->from('support@roshem.sa', 'Roshem Support');
            });
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->route('home');
    }


    public function newsletter(Request $request)
    {
        $request->validate([
            'mobile' => [
                'required',
                'regex:/^05[0-9]{8}$/', // Start with 05 and exactly 10 digits in total
            ],
            'message' => 'required',
        ], [
            'phone.regex' => 'يجب أن يبدأ رقم الهاتف بـ 05 وأن يتكون من 10 أرقام.', // Custom error message in Arabic
        ]);

        NewsLetter::create($request->all());

        return redirect()->back();
    }

    public function contactPage()
    {
        $services = Service::all();
        return view('home.contact', compact('services'));
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

    public function updates()
    {

        $categories = Category::with('projects')->get();
        return view('home.updates', compact('categories'));
    }

    public function privacy()
    {
        $privacies = Privacy::orderBy('id')->get();
        return view('home.privacy', compact('privacies'));
    }
    public function terms()
    {
        $terms = Terms::orderBy('id')->get();
        return view('home.terms', compact('terms'));
    }
}
