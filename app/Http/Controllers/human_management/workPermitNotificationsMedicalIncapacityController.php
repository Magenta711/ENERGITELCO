<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\general_setting;
use App\Models\hasPermissionWork;
use App\Models\project\planing\Project;
use App\Models\system_setting;
use App\Models\SystemMessages;
use App\Models\Work7;
use App\Notifications\notificationMain;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Session;

class workPermitNotificationsMedicalIncapacityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Aprobar solicitud de permiso laboral o notificación de incapacidad|Consultar solicitud de permisos laborales o notificaciones de incapacidad médica|Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica|Digitar formulario de solicitud de permiso laboral o notificación de incapacidad|Eliminar formato de solicitud de permisos laborales o notificaciones de incapacidad médica',['only' => ['index']]);
        $this->middleware('permission:Consultar solicitud de permisos laborales o notificaciones de incapacidad médica',['only' => ['show']]);
        $this->middleware('permission:Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica',['only' => ['download']]);
        $this->middleware('permission:Digitar formulario de solicitud de permiso laboral o notificación de incapacidad',['only' => ['create','store']]);
        $this->middleware('permission:Eliminar formato de solicitud de permisos laborales o notificaciones de incapacidad médica',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar solicitud de permiso laboral o notificación de incapacidad',['only' => ['approve']]);
        $this->message = SystemMessages::where('state',1)->where('name','Envio de formatos')->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medical_incapacities = Work7::with(['responsableAcargo','coordinadorAcargo'])->get();
        $users = User::where('state',1)->get();
        return view('human_management.medical_incapacity.index',compact('medical_incapacities','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->hasPermisisonWork && auth()->user()->hasPermisisonWork->amount > 0) {
            $usuarios = User::where('state',1)->with('roles')->get();
            $message = $this->message;
            return view('human_management.medical_incapacity.create',compact('usuarios','message'));
        }
        return redirect('home')->with('success','No tienes acceso a esta página.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasPermisisonWork && auth()->user()->hasPermisisonWork->amount > 0) {
            $request->validate([
                'cedula_trabajador'=>['required'],
                'motivo_permiso' => ['required'],
                'tipo_solicitud'=> ['required'],
                'fecha_inicio'=> ['required'],
                'fecha_finalizacion' => ['required'],
                'hora_inicio'=> ['required'],
                'hora_finalizacion' => ['required'],
            ]);
    
            if ($request->fecha_inicio > $request->fecha_finalizacion)
            {
                return redirect()->back()->withErrors('La fecha de finalización debe ser después de la fecha de inicio')->withInput();
            }else {
                if ($request->fecha_inicio == $request->fecha_finalizacion && $request->hora_inicio > $request->hora_finalizacion) {
                    return redirect()->back()->withErrors('La hora de finalización debe ser después de la hora de inicio')->withInput();
                }
            }
    
            if($request->hasFile('file')){
                $file = $request->file('file');
                $name = time().str_random().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/img/formulario7/',$name);
            }else {
                $name = '';
            }
    
            $format = Work7::create($request->all());
            
            
            $format->update([
                'estado'=>'Sin aprobar',
                'file'=>$name,
                'responsable'=> auth()->id(),
            ]);
                
            $users = User::where('state',1)->get();
    
            foreach ($users as $user) {
                if ($user->hasPermissionTo('Aprobar solicitud de permiso laboral o notificación de incapacidad')){
                    $user->notify(new notificationMain($format->id,'Solicitud de permiso laboral o notificación de incapacidad '.$format->id,'human_management/work_permits_notifications_medical_incapacity/show/'));
                }
            }
            
            Mail::send('human_management.medical_incapacity.mail.main', ['format' => $format], function ($menssage) use ($format)
            {
                $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
                $company = general_setting::where('state',1)->pluck('company')->first();
                $email = explode(';',$emails);
                for ($i=0; $i < count($email); $i++) { 
                    if($email[$i] != ''){
                        $menssage->to(trim($email[$i]),$company);
                    }
                }
                $menssage->subject("Energitelco S.A.S H-FR-24 SOLICITUD DE PERMISO LABORAL O NOTIFICACIÓN DE INCAPACIDAD MÉDICA");
            });

            $has = hasPermissionWork::where('user_id',$request->cedula_trabajador);
            if ($has) {
                $has->update([
                    'amount' => $has->amount - 1,
                ]);
            }
    
            return redirect()->route('work_permits_notifications_medical_incapacity')->with('success','Se ha enviado el formulario correctamente para su aprobación por parte de un coordinador.');
        }
        return redirect('home')->with('success','No tienes acceso a esta página.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Work7::with([
            'trabajador' => function ($query)
            {
                $query->with('position');
            },'responsableAcargo' => function ($query)
            {
                $query->with('roles');
            },'coordinadorAcargo' => function ($query)
            {
                $query->with('roles');
            }
        ])->find($id);
        return view('human_management.medical_incapacity.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work7 $id)
    {
        $id->delete();
        return redirect()->route('medical_incapacity')->with('success','Se ha eliminado el formato correctamente');
    }
    
    /**
     * Download in pdf the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download(Work7 $id)
    {
        $pdf = PDF::loadView('human_management/medical_incapacity/pdf/main',['trabajo' => $id]);
        return $pdf->download($id->codigo_formulario.'-'.$id->id.'_PERMISO_DE_TRABAJO.pdf');
    }
    
    /**
     * Aprove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve(Work7 $id, Request $request)
    {
        if ($request->status == 'Aprobado') {
            $request->validate([
                'observaciones_jefe'=>['required'],
            ]);

            $id->update([
                'estado'=>"Aprobado",
                'fecha_aprobacion'=>now()->format('Y-m-d'),
                'hora_aprobacion'=>now()->format('H:i:s'),
                'coordinador' => auth()->id(),
                'observaciones_jefe' => $request->observaciones_jefe
            ]);
    
            $id->responsableAcargo->notify(new notificationMain($id->id,'Se ha aprobado la solicitud de permiso laboral '.$id->id,'human_management/work_permits_notifications_medical_incapacity/show/'));
            $id->trabajador->notify(new notificationMain($id->id,'Se ha aprobado la solicitud de permiso laboral '.$id->id,'human_management/work_permits_notifications_medical_incapacity/show/'));
            
            Mail::send('human_management.medical_incapacity.mail.main', ['format' => $id], function ($menssage) use ($id)
            {
                $emails = system_setting::where('state',1)->pluck('approval_emails')->first();
                $company = general_setting::where('state',1)->pluck('company')->first();
                $email = explode(';',$emails);
                for ($i=0; $i < count($email); $i++) {
                    if($email[$i] != ''){
                        $menssage->to(trim($email[$i]),$company);
                    }
                }
                $usuario = User::find($id->responsable);
                $menssage->to($usuario->email,$usuario->name)->subject("Energitelco S.A.S H-FR-24 SOLICITUD DE PERMISO LABORAL O NOTIFICACIÓN DE INCAPACIDAD MÉDICA APROBADA");
            });
    
            return redirect()->route('approval')->with(['success'=>'Se ha aprobado la solicitud de permiso laboral o notificación de incapacidad médica '.$id->id.' correctamente','sudmenu'=>7]);
        }else {
            $request->validate([
                'observaciones_jefe'=>['required'],
            ]);
            
            $id->update([
                'estado'=>"No aprobado",
                'fecha_aprobacion'=>now()->format('Y-m-d'),
                'hora_aprobacion'=>now()->format('H:i:s'),
                'coordinador' => auth()->id(),
                'observaciones_jefe' => $request->observaciones_jefe,
            ]);
    
            $id->responsableAcargo->notify(new notificationMain($id->id,'No se aprobó la solicitud de permiso laboral '.$id->id,'human_management/work_permits_notifications_medical_incapacity/show/'));
            $id->trabajador->notify(new notificationMain($id->id,'No se aprobó la solicitud de permiso laboral '.$id->id,'human_management/work_permits_notifications_medical_incapacity/show/'));
            
            Mail::send('human_management.medical_incapacity.mail.main', ['format' => $id], function ($menssage) use ($id)
            {
                $emails = system_setting::where('state',1)->pluck('approval_emails')->first();
                $company = general_setting::where('state',1)->pluck('company')->first();
                $email = explode(';',$emails);
                for ($i=0; $i < count($email); $i++) {
                    if($email[$i] != ''){
                        $menssage->to(trim($email[$i]),$company);
                    }
                }
                $menssage->to($id->responsableAcargo->email,$id->responsableAcargo->name)->subject("Energitelco S.A.S, SOLICITUD DE PERMISO LABORAL O NOTIFICACIÓN DE INCAPACIDAD MÉDICA NO APROBADA");
            });
            return redirect()->route('approval')->with(['success'=>'Se ha desaprobado la solicitud de permiso laboral o notificación de incapacidad médica correctamente','sudmenu'=>7]);
        }
    }
    public function plus($id)
    {
        $data = hasPermissionWork::where('user_id',$id)->first();
        if ($data) {
            $data->update([
                'responsable_id' => auth()->id(),
                'amount' => $data->amount + 1,
            ]);
        }else {
            $data = hasPermissionWork::create([
                'user_id' => $id,
                'responsable_id' => auth()->id(),
                'amount' => 1,
            ]);
        }

        return response()->json( $data );
    }
    public function rest($id)
    {
        $data = hasPermissionWork::where('user_id',$id)->first();
        if ($data) {
            if ($data->amount > 0) {
                $data->update([
                    'responsable_id' => auth()->id(),
                    'amount' => $data->amount - 1,
                ]);
            }
        }else {
            $data = hasPermissionWork::create([
                'user_id' => $id,
                'responsable_id' => auth()->id(),
                'amount' => 0,
            ]);
        }

        return response()->json( $data );
    }
}