<?php

namespace App\Http\Controllers;

use App\Models\Positions;
use App\Models\WorkWithUs;
use App\Models\system_setting;
use App\Models\general_setting;
use App\User;
use App\Notifications\notificationMain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobApplicationController extends Controller
{
    public function __construct() {
        $this->middleware('permission:Lista de solicitudes de empleo|Ver solicitudes de empleo',['only' => ['index']]);
        $this->middleware('permission:Ver solicitudes de empleo',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = WorkWithUs::with('position','register')->get();
        return view('job_application.index',compact('works'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Positions::where('offer',1)->get(['id','description']);
        return view('job_application.create',compact('positions'));
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
            'email' => ['email','required'],
            'name' => ['required','string'],
            'tel' => ['required'],
            'position_id' => ['required'],
            'comentary' => ['required','string'],
            'file' => ['file','required'],
        ]);
        $work = WorkWithUs::create($request->all());
        if ($request->hasFile('file')){
            $file=$request->file('file');
            $name= time().str_random().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/file/work_with_us/',$name);
            $work->update([
                'file' => $name,
                'state' => 0,
            ]);
        }

        $users = User::where('state',1)->get();
        
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de solicitudes de empleo')) {
                $user->notify(new notificationMain($work->id,'Nueva solicitud de empleo '.$work->id,'job_application/'));
            }
        }

        Mail::send('emails.work_with_us', ['request' => $request, 'id' => $work->id], function ($menssage)
        {
            $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
            $company = general_setting::where('state',1)->pluck('company')->first();
            $email = explode(';',$emails);
            for ($i=0; $i < count($email); $i++) {
                if($email[$i] != ''){
                    $menssage->to(trim($email[$i]),$company);
                }
            }
            $menssage->subject("Energitelco S.A.S. Solicitud de empleo.");
        });

        return redirect()->route('work_with_us')->with('success','Su solicitud ha sido enviada con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = WorkWithUs::with('position')->find($id);
        return view('job_application.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkWithUs $id)
    {
        $positions = Positions::get();
        return view('job_application.edit',compact('id','positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,WorkWithUs $id)
    {
        $request->validate([
            'position_id' => 'required',
        ]);
        $id->update([
            'position_id' => $request->position_id
        ]);
        return redirect()->route('job_application')->with('success','Se ha editado la solicitud de empleo.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkWithUs $id)
    {
        $id->delete();
        return redirect()->route('job_application')->with('success','Se ha eliminado la solicitud de empleo.');
    }
}
