<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proceeding;
use App\Models\ProceedingCommitment;
use App\Models\Responsable;
use App\Models\signature;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class proceedingController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de actas|Ver actas|Editar actas|Eliminar actas|Descargar actas|Crear actas',['only' => ['index']]);
        $this->middleware('permission:Ver actas',['only' => ['show']]);
        $this->middleware('permission:Descargar actas',['only' => ['download']]);
        $this->middleware('permission:Crear actas',['only' => ['create','store']]);
        $this->middleware('permission:Editar actas',['only' => ['edit','update']]);
        $this->middleware('permission:Eliminar actas',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proceedings = Proceeding::get();
        return view('human_management.proceedings.index',compact('proceedings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('state',1)->get();
        return view('human_management.proceedings.create',compact('users'));
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
            'assistants_id' => ['required'],
            'city' => ['required'],
            'date' => ['required'],
            'time_start' => ['required'],
            'time_end' => ['required'],
            'theme' => ['required'],
            'affair' => ['required'],
            'place' => ['required'],
            'development' => ['required'],
        ]);
        $pro = Proceeding::create([
            'date' => $request->date,
            'city' => $request->city,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'place' => $request->place,
            'theme' => $request->theme,
            'num' => 1,
            'development' => $request->development,
            'affair' => $request->affair,
            'status' => ($request->user_id) ? 2 : 1,
            'responsable_id' => auth()->id(),
            'assistant' => count($request->assistants_id),
            'guest' => $request->guest_id ? count($request->guest_id) : 0,
        ]);
        for ($i=0; $i < count($request->assistants_id); $i++) { 
            Responsable::create([
                'user_id' => $request->assistants_id[$i],
                'responsibles_type' => 'App\Models\Proceeding',
                'responsibles_id' => $pro->id,
            ]);
        }
        if ($request->guest_id) {
            for ($i=0; $i < count($request->guest_id); $i++) { 
                Responsable::create([
                    'user_id' => $request->guest_id[$i],
                    'responsibles_type' => 'App\Models\Proceeding',
                    'responsibles_id' => $pro->id,
                ]);
            }
        }
        if ($request->user_id) {
            for ($i=0; $i < count($request->user_id); $i++) { 
                ProceedingCommitment::create([
                    'proceeding_id' => $pro->id,
                    'user_id' => $request->user_id[$i],
                    'commitment' => $request->commitment[$i],
                    'status' => 1,
                ]);
            }
        }

        if($request->hasFile('files')){
            for ($i=0; $i < count($request->file('files')); $i++) { 
                $file = $request->file('files')[$i];
                $name = time().str_random().'.'.$file->getClientOriginalExtension();
                if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                    $size = 500;
                    Image::make($file->getRealPath())
                        ->resize(null, 500, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save(public_path('storage/human_management/call_attention/'.$name));
                        $size = $file->getClientSize() / 1000;
                }else{
                    $size = $file->getClientSize() / 1000;
                    $path = Storage::putFileAs('public/human_management/call_attention', $file, $name);
                }
                $pro->files()->create([
                    'name' => $name,
                    'description' => "Descargo: ".$request->affair,
                    'size' => $size.' KB',
                    'url' => $path,
                    'type' => $file->getClientOriginalExtension(),
                    'state' => 1
                ]);
            }
        }

        Mail::send('human_management.proceedings.mail.main', ['id' => $pro], function ($menssage) use ($pro)
        {
            foreach ($pro->users as $value) {
                $menssage->to($value->email,$value->name)->subject("Energitelco S.A.S. Acta de reuniones ".$pro->affair);
            }
            $menssage->subject("Energitelco S.A.S. Acta de reuniones ".$pro->affair);
        });

        return redirect()->route('proceeding')->with('success','Se ha gardado el acta correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Proceeding::with(['users'=>function($query)
        {
            $query->with('position');
        },'signaturebles'=>function ($query)
        {
            $query->with('roles');
        },'commitments'])->find($id);
        return view('human_management.proceedings.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Proceeding::with(['users'=>function($query)
        {
            $query->with('position');
        },'signaturebles'=>function ($query)
        {
            $query->with('roles');
        },'commitments'])->find($id);
        $users = User::where('state',1)->get();

        return view('human_management.proceedings.edit',compact('id','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Proceeding $id)
    {
        $request->validate([
            'assistants_id' => ['required'],
            'city' => ['required'],
            'date' => ['required'],
            'time_start' => ['required'],
            'time_end' => ['required'],
            'theme' => ['required'],
            'affair' => ['required'],
            'place' => ['required'],
            'development' => ['required'],
        ]);
        $total_guest = $request->guest_id ? count($request->guest_id) : 0;
        $total_assistants = count($request->assistants_id);
        $id->update([
            'date' => $request->date,
            'city' => $request->city,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'place' => $request->place,
            'theme' => $request->theme,
            'num' => 1,
            'development' => $request->development,
            'affair' => $request->affair,
            'status' => ($request->user_id) ? 2 : 1,
            'assistant' => $total_assistants,
            'guest' => $total_guest,
        ]);
        $i = 0;
        $acount = count($id->users);
        $total_assis = $total_assistants + $total_guest;
        foreach ($id->users as $user) {
            if ($total_assistants > $i) {
                Responsable::where('responsibles_type','App\Models\Proceeding')->where('responsibles_id',$id->id)->where('user_id',$user->id)->update([
                    'user_id' => $request->assistants_id[$i],
                ]);
            }
            if ($request->guest_id && $total_assistants >= $i && $total_assis < $i) {
                Responsable::where('responsibles_type','App\Models\Proceeding')->where('responsibles_id',$id->id)->where('user_id',$user->id)->update([
                    'user_id' => $request->guest_id[$i],
                ]);
            }
            $i++;
        }
        if ($acount < $total_assis) {
            if ($total_assistants > $i) {
                for ($j=$i; $j < $total_assistants; $j++) {
                    Responsable::create([
                        'user_id' => $request->assistants_id[$j],
                        'responsibles_type' => 'App\Models\Proceeding',
                        'responsibles_id' => $id->id,
                    ]);
                }
                $i = $j;
            }
            if ($request->guest_id) {
                for ($j= $i; $j < $total_guest; $j++) { 
                    Responsable::create([
                        'user_id' => $request->guest_id[$j],
                        'responsibles_type' => 'App\Models\Proceeding',
                        'responsibles_id' => $id->id,
                    ]);
                }
            }
        }
        $acount = count($id->commitments);
        $status = 0;
        $total = 0;
        $i = 0;
        if ($request->user_id) {
            foreach ($id->commitments as $commitment) {
                $commitment->update([
                    'user_id' => $request->user_id[$i],
                    'commitment' => $request->commitment[$i],
                    'date_execution' => $request->date_execution[$i],
                    'status' => 1,
                ]);
                if ($request->date_execution[$i]) {
                    $status++;
                }
                $total++;
                $i++;
            }
        }
        if ($request->user_id) {
            for ($i=$acount; $i < count($request->user_id); $i++) { 
                ProceedingCommitment::create([
                    'user_id' => $request->user_id[$i],
                    'commitment' => $request->commitment[$i],
                    'date_execution' => $request->date_execution[$i],
                    'status' => 1,
                ]);
                if ($request->date_execution[$i]) {
                    $status++;
                }
                $total++;
            }
            if ($status == $total) {
                $id->update(['status' => 1]);
            }
        }

        if($request->hasFile('files')){
            for ($i=0; $i < count($request->file('files')); $i++) { 
                $file = $request->file('files')[$i];
                $name = time().str_random().'.'.$file->getClientOriginalExtension();
                if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                    $size = 500;
                    Image::make($file->getRealPath())
                        ->resize(null, 500, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save(public_path('storage/human_management/call_attention/'.$name));
                        $size = $file->getClientSize() / 1000;
                }else{
                    $size = $file->getClientSize() / 1000;
                    $path = Storage::putFileAs('public/human_management/call_attention', $file, $name);
                }
                $id->files()->create([
                    'name' => $name,
                    'description' => "Descargo: ".$request->affair,
                    'size' => $size.' KB',
                    'url' => $path,
                    'type' => $file->getClientOriginalExtension(),
                    'state' => 1
                ]);
            }
        }

        // Mail::send('human_management.proceedings.mail.main', ['id' => $id], function ($menssage) use ($id)
        // {
        //     foreach ($id->users as $value) {
        //         $menssage->to($value->email,$value->name)->subject("Energitelco S.A.S. Acta de reuniones actualizada ".$id->affair);
        //     }
        //     $menssage->subject("Energitelco S.A.S. Acta de reuniones ".$id->affair);
        // });

        return redirect()->route('proceeding')->with('success','Se ha actualizado el acta correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Proceeding $id)
    {
        $id->delete();
        return redirect()->route('proceeding')->with('success','Se ha eliminado el acta correctamente');
    }

    public function signature(Proceeding $id)
    {
        signature::create([
            'signatures_type' => 'App\Models\Proceeding',
            'signatures_id' => $id->id,
            'user_id' => auth()->id()
        ]);
        return redirect()->back()->with('success','Se ha firmado la acta correctamente');
    }

    public function download (Proceeding $id){
        $pdf = PDF::loadView('human_management/proceedings/pdf/main',['id' => $id]);
        return $pdf->download($id->id.'_acta.pdf');
    }
}
