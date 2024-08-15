<?php

namespace App\Http\Controllers\Dashboard;

use Mail;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Promoter;
use Illuminate\Http\Request;

class PromoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promoters=Promoter::orderBy('name', 'asc')->whenSearch(request()->search)->paginate(30);
        return view('dashboard.promoters.index',compact('promoters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.promoters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
        ]);

        Promoter::create($request->all());
        return redirect()->route('dashboard.promoters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promoter=Promoter::find($id);
        if($promoter){
            return view('dashboard.promoters.edit', compact('promoter'));
        }
        else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);

        $promoter=Promoter::find($id);
        $promoter->update($request->all());
        return redirect()->route('dashboard.promoters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promoter=Promoter::find($id);
        if($promoter){
            $promoter->delete();
            return redirect()->back();
        }else{
            abort(404);
        }
    }

    public function notify()
    {
        $projects=Project::all();
        $promoters=Promoter::all();
        return view('dashboard.promoters.notify', compact('projects', 'promoters'));
    }

    public function send_mail(Request $request )
    {
        $request->validate([
            'details'=> 'required',
            'promoters' => 'required'
        ]);

        $promoters=null;
        if($request->promoters[0]==null){

        $promoters = Promoter::all();

        }else{

        $promoters = Promoter::whereIn('id',$request->promoters)->get();

        }
        // dd($promoters);
        foreach ($promoters as $key => $promoter) {
            $info = array(
                'name' => $promoter->name,
                'project' => $request->project,
                'details'=> $request->details
            );
            Mail::send('mail', $info, function ($message) use ($promoter) {
                $message->to($promoter->email, $promoter->name)
                    ->subject('إشعار مشروع جديد من القدسي');
                $message->from('info@alqodsii.com', 'alqodsii');
            });

            // echo "Successfully sent the email";
        }

        session()->flash('success', 'Email Sent Successfully');
        return redirect()->route('dashboard.projects.index');
    }


}
