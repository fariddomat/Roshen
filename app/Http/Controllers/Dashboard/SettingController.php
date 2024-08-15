<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Models\LogSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Session;
use App\Rules\MatchOldPassword;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{


    public function cover()
    {
        return view('dashboard.settings.cover');
    }

    public function change_cover(Request $request)
    {
        setting($request->all())->save();
        setting([
            'cover_time' => now()
        ])->save();
        if ($request->cover3) {

            Storage::disk('public_html')->delete('/home/images/3.jpg');
            $img = Image::make($request->cover3)->encode('webp', 90);
            Storage::disk('public_html')->put('/home/images/3.jpg', (string)$img, 'public');
        }
        if ($request->cover2) {

            // Storage::disk('public_html')->delete('/home/images/2.jpg');
            $img = Image::make($request->cover2)->encode('webp', 90);
            Storage::disk('public_html')->put('/home/images/2.jpg', (string)$img, 'public');
        }
        if ($request->cover1) {

            Storage::disk('public_html')->delete('/home/images/1.jpg');
            $img = Image::make($request->cover1)->encode('webp', 90);
            Storage::disk('public_html')->put('/home/images/1.jpg', (string)$img, 'public');
        }
        return redirect()->back();
    }


    public function logs()
    {
        $logs = LogSystem::latest()->paginate(50);
        return view('dashboard.settings.logs', compact('logs'));
    }

    public function settingsText()
    {
        return view('dashboard.settings.settings');
    }

    public function settings(Request $request)
    {
        setting($request->all())->save();

        session()->flash('success', 'Successfully added !');
        return redirect()->back();
    }

    public function social()
    {
        return view('dashboard.settings.social');
    }

    public function chart()
    {
        return view('dashboard.settings.chart');
    }

    public function changePassword()
    {
        $user = Auth::user();
        return view('dashboard.settings.changePassword')->with([
            'user' => $user
        ]);
    }

    public function changePass(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('dashboard.home');
    }

    public function contact()
    {
        $contacts = Contact::latest()->paginate(5);
        return view('dashboard.settings.contacts', compact('contacts'));
    }

    public function exportCSV(Request $request)
    {
        $fileName = 'contacts.csv';
        $contacts = Contact::all();

        $headers = array(
            "Content-Encoding" => "utf8",
            "Content-type"        => "text/csv; charset=utf8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('name', 'email', 'phone', 'message', 'created_at');

        $callback = function () use ($contacts, $columns) {
            $file = fopen('php://output', 'w');

            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
            fputcsv($file, $columns);

            foreach ($contacts as $contact) {
                $row['name']  = $contact->name;
                $row['email']  = $contact->email;
                $row['phone']  = $contact->phone;
                $row['message']  = $contact->message;
                $row['created_at']  = $contact->created_at;

                fputcsv($file, array($row['name'], $row['email'], $row['phone'], $row['message'], $row['created_at']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function markAsRead($id)
    {
        $contacts = Contact::find($id);
        $contacts->update([
            'status' => 'read'
        ]);
        return redirect()->back();
    }
}
