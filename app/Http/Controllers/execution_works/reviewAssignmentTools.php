<?php

namespace App\Http\Controllers\execution_works;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SystemMessages;
use App\Models\general_setting;
use App\Models\invComputer;
use App\Models\system_setting;
use App\Models\Work4;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use App\Notifications\notificationMain;
use App\User;

class reviewAssignmentTools extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Aprobar solicitud de Revisión y asignación de herramientas|Consultar revisión y asignación de herramientas|Descargar PDF de revisión y asignación de herramientas|Digitar formulario de Revisión y asignación de herramientas|Eliminar formato de revisión y asignación de herramientas',['only' => ['index']]);
        $this->middleware('permission:Consultar revisión y asignación de herramientas',['only' => ['show']]);
        $this->middleware('permission:Descargar PDF de revisión y asignación de herramientas',['only' => ['download']]);
        $this->middleware('permission:Digitar formulario de Revisión y asignación de herramientas',['only' => ['create','store']]);
        $this->middleware('permission:Eliminar formato de revisión y asignación de herramientas',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar solicitud de Revisión y asignación de herramientas',['only' => ['approve']]);
        $this->message = SystemMessages::where('state',1)->where('name','Envio de formatos')->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $review_tools = Work4::with(['responsableAcargo','coordinadorAcargo'])->get();
        return  view('execution_works.review_tools.index',compact('review_tools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::where('state',1)->with('roles')->get();
        $message = $this->message;
        $computers = invComputer::where('status','!=',0)->get();
        return view('execution_works.review_tools.create',compact('usuarios','message','computers'));
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
            'cedula_revisor'=>['required'],
            'cedula_revisado'=>['required'],
            ]);
            $error_herramienta = '';
            $error_equipo = '';
        if(
            $request->cantidad_1 == '' || $request->marca_1 == '' || $request->observacion_1 == '' ||
            $request->cantidad_2 == '' || $request->marca_2 == '' || $request->observacion_2 == '' ||
            $request->cantidad_6 == '' || $request->marca_6 == '' || $request->observacion_6 == '' ||
            $request->cantidad_7 == '' || $request->marca_7 == '' || $request->observacion_7 == '' ||
            $request->cantidad_8 == '' || $request->marca_8 == '' || $request->observacion_8 == '' || 
            $request->cantidad_9 == '' || $request->marca_9 == '' || $request->observacion_9 == '' || 
            $request->cantidad_10 == '' || $request->marca_10 == '' || $request->observacion_10 == '' || 
            $request->cantidad_11 == '' || $request->marca_11 == '' || $request->observacion_11 == '' || 
            $request->cantidad_12 == '' || $request->marca_12 == '' || $request->observacion_12 == '' ||
            $request->cantidad_13 == '' || $request->marca_13 == '' || $request->observacion_13 == '' || 
            $request->cantidad_14 == '' || $request->marca_14 == '' || $request->observacion_14 == '' || 
            $request->cantidad_15 == '' || $request->marca_15 == '' || $request->observacion_15 == '' ||
            $request->cantidad_17 == '' || $request->marca_17 == '' || $request->observacion_17 == '' || 
            $request->cantidad_19 == '' || $request->marca_19 == '' || $request->observacion_19 == '' || 
            $request->cantidad_20 == '' || $request->marca_20 == '' || $request->observacion_20 == '' ||
            $request->cantidad_21 == '' || $request->marca_21 == '' || $request->observacion_21 == ''
        ){
            $error_herramienta = 'NO ES POSIBLE ENVIAR FORMULARIO HASTA QUE NO COMPLETE LA HERRAMIENTA OBLIGATORIA MÍNIMA.';
        }
        if(
            $request->cantidad_38 == '' || $request->marca_38 == '' || $request->observacion_38 == '' ||
            $request->cantidad_39 == '' || $request->marca_39 == '' || $request->observacion_39 == '' ||
            $request->cantidad_40 == '' || $request->marca_40 == '' || $request->observacion_40 == '' ||
            $request->cantidad_41 == '' || $request->marca_41 == '' || $request->observacion_41 == '' ||
            $request->cantidad_42 == '' || $request->marca_42 == '' || $request->observacion_42 == '' ||
            $request->cantidad_43 == '' || $request->marca_43 == '' || $request->observacion_43 == '' ||
            $request->cantidad_44 == '' || $request->marca_44 == '' || $request->observacion_44 == '' ||
            $request->cantidad_45 == '' || $request->marca_45 == '' || $request->observacion_45 == ''
        ){
            $error_equipo = 'NO ES POSIBLE ENVIAR FORMULARIO HASTA QUE NO COMPLETE EL EQUIPO OBLIGATORIO LEGAL MÍNIMO.';
        }

        if($error_equipo || $error_herramienta){
            return redirect()->back()->withErrors([$error_herramienta,$error_equipo])->withInput();
        }
        $comp = $request->marca_29;
        $id = Work4::create($request->all());

        if ($request->marca_29) {
            $com = invComputer::find($request->marca_29);
            if ($com->user_id != $request->cedula_revisado) {
                $com->update([
                    'user_id' => $request->cedula_revisado,
                    'commentary' => $com->commentary."\n".now()->format('d-M-Y').": Asignación de herramientas O-FR-06-".$id->id
                ]);
            }
            $comp = $com->brand.' '.$com->serial;
        }

        $id->update([
            'marca_29' => $comp,
            'estado'=>'Sin aprobar',
            'responsable'=> auth()->id(),
        ]);

        $mensaje = "Estás recibiendo una solicitud de revisión y asignación de herramientas.";

        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Aprobar solicitud de Revisión y asignación de herramientas')){
                $user->notify(new notificationMain($id->id,'Solicitud de revición de herramientas '.$id->id,'execution_works/review_assignment_tools/show/'));
            }
        }
        
        Mail::send('execution_works.review_tools.mail.main', ['format' => $id,'mensaje'=>$mensaje], function ($menssage) use ($id)
        {
            $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
            $company = general_setting::where('state',1)->pluck('company')->first();
            $email = explode(';',$emails);
            for ($i=0; $i < count($email); $i++) { 
                if($email[$i] != ''){
                    $menssage->to(trim($email[$i]),$company);
                }
            }
            $menssage->to($id->responsableAcargo->email,$id->responsableAcargo->name)->to($id->revisado->email,$id->revisado->name)->subject("Energitelco S.A.S solictud de REVISIÓN Y ASIGNACIÓN DE ACTIVOS A ".$id->revisado->name);
        });
        
        return redirect()->route('review_assignment_tools')->with('success','Se ha enviado el formulario correctamente para su aprobación por parte de un coordinador.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Work4::with(['revisor','revisado',
            'coordinadorAcargo' =>function ($query)
            {
                $query->with('roles');
            },
            'responsableAcargo' =>function ($query)
            {
                $query->with('roles');
            }
        ])->find($id);
        return view('execution_works.review_tools.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Work4::with(['revisor','revisado',
            'coordinadorAcargo' =>function ($query)
            {
                $query->with('roles');
            },
            'responsableAcargo' =>function ($query)
            {
                $query->with('roles');
            }
        ])->find($id);
        $message = $this->message;
        $computers = invComputer::where('status','!=',0)->get();
        return view('execution_works.review_tools.edit',compact('id','computers','message'));
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
        $error_herramienta = '';
        $error_equipo = '';
        if(
            $request->cantidad_1 == '' || $request->marca_1 == '' || $request->observacion_1 == '' ||
            $request->cantidad_2 == '' || $request->marca_2 == '' || $request->observacion_2 == '' ||
            $request->cantidad_6 == '' || $request->marca_6 == '' || $request->observacion_6 == '' ||
            $request->cantidad_7 == '' || $request->marca_7 == '' || $request->observacion_7 == '' ||
            $request->cantidad_8 == '' || $request->marca_8 == '' || $request->observacion_8 == '' || 
            $request->cantidad_9 == '' || $request->marca_9 == '' || $request->observacion_9 == '' || 
            $request->cantidad_10 == '' || $request->marca_10 == '' || $request->observacion_10 == '' || 
            $request->cantidad_11 == '' || $request->marca_11 == '' || $request->observacion_11 == '' || 
            $request->cantidad_12 == '' || $request->marca_12 == '' || $request->observacion_12 == '' ||
            $request->cantidad_13 == '' || $request->marca_13 == '' || $request->observacion_13 == '' || 
            $request->cantidad_14 == '' || $request->marca_14 == '' || $request->observacion_14 == '' || 
            $request->cantidad_15 == '' || $request->marca_15 == '' || $request->observacion_15 == '' ||
            $request->cantidad_17 == '' || $request->marca_17 == '' || $request->observacion_17 == '' || 
            $request->cantidad_19 == '' || $request->marca_19 == '' || $request->observacion_19 == '' || 
            $request->cantidad_20 == '' || $request->marca_20 == '' || $request->observacion_20 == '' ||
            $request->cantidad_21 == '' || $request->marca_21 == '' || $request->observacion_21 == ''
        ){
            $error_herramienta = 'NO ES POSIBLE ENVIAR FORMULARIO HASTA QUE NO COMPLETE LA HERRAMIENTA OBLIGATORIA MÍNIMA.';
        }
        if(
            $request->cantidad_38 == '' || $request->marca_38 == '' || $request->observacion_38 == '' ||
            $request->cantidad_39 == '' || $request->marca_39 == '' || $request->observacion_39 == '' ||
            $request->cantidad_40 == '' || $request->marca_40 == '' || $request->observacion_40 == '' ||
            $request->cantidad_41 == '' || $request->marca_41 == '' || $request->observacion_41 == '' ||
            $request->cantidad_42 == '' || $request->marca_42 == '' || $request->observacion_42 == '' ||
            $request->cantidad_43 == '' || $request->marca_43 == '' || $request->observacion_43 == '' ||
            $request->cantidad_44 == '' || $request->marca_44 == '' || $request->observacion_44 == '' ||
            $request->cantidad_45 == '' || $request->marca_45 == '' || $request->observacion_45 == ''
        ){
            $error_equipo = 'NO ES POSIBLE ENVIAR FORMULARIO HASTA QUE NO COMPLETE EL EQUIPO OBLIGATORIO LEGAL MÍNIMO.';
        }

        if($error_equipo || $error_herramienta){
            return redirect()->back()->withErrors([$error_herramienta,$error_equipo])->withInput();
        }
        $comp = $request->marca_29;
        $id = Work4::create($request->all());

        if ($request->marca_29) {
            $com = invComputer::find($request->marca_29);
            if ($com->user_id != $request->cedula_revisado) {
                $com->update([
                    'user_id' => $request->cedula_revisado,
                    'commentary' => $com->commentary."\n".now()->format('d-M-Y').": Asignación de herramientas O-FR-06-".$id->id
                ]);
            }
            $comp = $com->brand.' '.$com->serial;
        }

        $id->update([
            'marca_29' => $comp,
            'estado'=>'Sin aprobar',
            'responsable'=> auth()->id(),
            'fecha_aprobacion'=>null,
            'hora_aprobacion'=>null,
        ]);

        $mensaje = "Estás recibiendo una solicitud de revisión y asignación de herramientas.";

        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Aprobar solicitud de Revisión y asignación de herramientas')){
                $user->notify(new notificationMain($id->id,'Solicitud de revición de herramientas '.$id->id,'execution_works/review_assignment_tools/show/'));
            }
        }
        
        Mail::send('execution_works.review_tools.mail.main', ['format' => $id,'mensaje'=>$mensaje], function ($menssage) use ($id)
        {
            $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
            $company = general_setting::where('state',1)->pluck('company')->first();
            $email = explode(';',$emails);
            for ($i=0; $i < count($email); $i++) { 
                if($email[$i] != ''){
                    $menssage->to(trim($email[$i]),$company);
                }
            }
            $menssage->to($id->responsableAcargo->email,$id->responsableAcargo->name)->to($id->revisado->email,$id->revisado->name)->subject("Energitelco S.A.S solictud de REVISIÓN Y ASIGNACIÓN DE ACTIVOS A ".$id->revisado->name);
        });

        return redirect()->route('review_assignment_tools')->with('success','Se ha enviado el formulario correctamente para su aprobación por parte de un coordinador.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work4 $id)
    {
        $id->delete();
        return redirect()->route('review_assignment_tools')->with('success','Se ha eliminado el formato correctamente');
    }

    public function download(Work4 $id)
    {
        $pdf = PDF::loadView('execution_works/review_tools/pdf/main',['trabajo' => $id]);
        return $pdf->download($id->codigo_formulario.'-'.$id->id.'_REVISION_Y_ASIGNACION_DE_HERRAMIENTA.pdf');
    }
    
    /**
     * Aprove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function approve(Request $request,Work4 $id)
    {
        if ($request->status == 'Aprobado') 
        {
            $id->update([
                'estado'=>"Aprobado",
                'commentary'=>$request->commentary,
                'fecha_aprobacion'=>now()->format('Y-m-d'),
                'hora_aprobacion'=>now()->format('H:i:s'),
                'coordinador' => auth()->id(),
            ]);
    
            $id->revisor->notify(new notificationMain($id->id,'Se ha aprobado la solicitud de revición de herramientas '.$id->id,'execution_works/review_assignment_tools/show/'));
            $id->revisado->notify(new notificationMain($id->id,'Se ha aprobado la solicitud de revición de herramientas '.$id->id,'execution_works/review_assignment_tools/show/'));
            
            //Correo por si aprueba
            $mensaje = "Se asignaron los siguientes activos fijos a ".$id->revisado->name;
            
            Mail::send('execution_works.review_tools.mail.main', ['format' => $id, 'mensaje' => $mensaje], function ($menssage) use ($id)
            {
                $menssage->to($id->responsableAcargo->email,$id->responsableAcargo->name)->to($id->revisado->email,$id->revisado->name)->subject("Energitelco S.A.S. O-FR-06 REVISIÓN Y ASIGNACIÓN DE ACTIVOS EXITOSA");
            });
            
            return redirect()->route('approval')->with(['success'=>'Se ha aprobado la solicitud '.$id->id.' correctamente','sudmenu' => 4]);
        }else {
            $id->update([
                'estado'=>"No aprobado",
                'commentary'=>$request->commentary,
                'coordinador' => auth()->id(),
            ]);
            
            $id->revisor->notify(new notificationMain($id->id,'No se aprobó la solicitud de revición de herramientas '.$id->id,'execution_works/review_assignment_tools/show/'));
            $id->revisado->notify(new notificationMain($id->id,'No se aprobó la solicitud de revición de herramientas '.$id->id,'execution_works/review_assignment_tools/show/'));
            
            return redirect()->route('approval')->with(['success'=>'Se ha desaprobado la solicitud correctamente','sudmenu'=>4]);
        }
    }
}
