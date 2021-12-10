<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\SystemMessages;
use App\Models\Work1;
use App\User;
use App\Models\invVehicle;
use App\Models\project\planing\Project;
use App\Models\project\planing\commission_technical;
use Illuminate\Support\Facades\Session;
use App\Models\work1_add;
use App\Models\Responsable;
use App\Models\system_setting;
use App\Models\general_setting;
use App\Models\Tasking;
use App\Notifications\notificationMain;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;

class workPermitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Consultar permisos de trabajo|Descargar PDF de permisos de trabajo|Digitar formulario de Permisos de trabajo|Eliminar formato de permisos de trabajo|Aprobar solicitud de Permisos de trabajo|Aprobar solicitudes permisos propios',['only' => ['index']]);
        $this->middleware('permission:Consultar permisos de trabajo',['only' => ['show']]);
        $this->middleware('permission:Descargar PDF de permisos de trabajo',['only' => ['download']]);
        $this->middleware('permission:Digitar formulario de Permisos de trabajo',['only' => ['create','store']]);
        $this->middleware('permission:Eliminar formato de permisos de trabajo',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar solicitud de Permisos de trabajo|Aprobar solicitudes permisos propios',['only' => ['approve']]);
        $this->message = SystemMessages::where('state',1)->where('name','Envio de formatos')->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($all = null)
    {
        if ($all) {
            $work_permits = Work1::with(['responsableAcargo','users','coordinadorAcargo'])->get();
        }else {
            $work_permits = Work1::with(['responsableAcargo','users','coordinadorAcargo'])->whereBetween('created_at',[now()->subDays(10), now()])->get();
        }
        return view('human_management.work_permit.index',compact('work_permits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('state',1)->with('roles')->get();
        $projects = Project::get();
        $vehicles = invVehicle::where('status','!=',0)->get();
        $bonus_techinicals = commission_technical::get();
        $taskings = Tasking::whereYear('date_start',now())->whereMonth('date_start',now())->whereDay('date_start',now())->get();
        $myTasking = Tasking::whereYear('date_start',now())->whereMonth('date_start',now())->whereDay('date_start',now())->whereHas('users',function ($query)
        {
            return $query->where('id',auth()->id());
        })->get();
        $works = Work1::whereYear('created_at',now())->whereMonth('created_at',now())->whereDay('created_at',now())->get();
        $message = $this->message;
        // return $myTasking;
        // return $taskings;
        return view('human_management.work_permit.create',compact('users','message','projects','vehicles','bonus_techinicals','taskings','works'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'coordinador'=>['required'],
            'cedula'=>['required'],
            'equipos_energizados'=>['required'],
            'vehiculo_desplazamiento'=>['required'],
            'max_altura'=>['required'],
            'nombre_eb' => ['required','max:70'],
            'porcentaje_trabajo_presentado' => ['max:10'],
            'numero_dias_proyecto' => ['max:10'],
            'altura' => ['max:10'],
            'f9a1u1' => 'integer',
            'f9a1u2' => 'integer',
            'f9a1u3' => 'integer',
            'f9a2u1' => 'integer',
            'f9a2u2' => 'integer',
            'f9a2u3' => 'integer',
            'f9a3u1' => 'integer',
            'f9a3u2' => 'integer',
            'f9a3u3' => 'integer',
        ]);
        
        $required_energizado = '';
        $required_max_altura = '';
        $required_vehiculo = '';
        $form2 = '';
        $form4 = '';
        $form5 = '';
        $form6 = '';
        $foto_moto1='';
        $foto_moto2='';
        $foto_moto3='';
        $foto_moto4='';

        if($request->vehiculo_desplazamiento == ''){
            $required_vehiculo = "Debe contestar la preguta ¿El dia de hoy se desplaza en vehículo o moto de la empresa?";
        }else {
            if($request->vehiculo_desplazamiento == 'Moto'){
                if ($request->f5a1 = '' || $request->f5a2 = '' || $request->f5a3 = '' || $request->f5a4 = '' || $request->f5a5 = '' ||$request->f5a6 = '' || $request->f5a7 = '' || $request->f5a8 = '' || $request->f5a9 = '' || $request->f5a10 = ''  || $request->f5a11 = ''  || $request->f5a12 = '') {
                    $form5 = 'Es obligatorio a llenar el ítem 5';
                }
                if ($request->f6a1u1 = '' || $request->f6a2u1 = '' || $request->f6a3u1 = '' || $request->f6a4u1 = '') {
                    $form6 = 'Es obligatorio a llenar el ítem 6';
                }
            }
            if($request->vehiculo_desplazamiento == 'Carro'){
                if ($request->f5a1 = '' || $request->f5a2 = '' || $request->f5a3 = '' || $request->f5a4 = '' || $request->f5a5 = '' ||$request->f5a6 = '' || $request->f5a7 = '' || $request->f5a8 = '' || $request->f5a9 = '' || $request->f5a10 = ''  || $request->f5a11 = ''  || $request->f5a12 = '') {
                    $form5 = 'Es obligatorio a llenar el ítem 5';
                }
            }
        }
        if($request->equipos_energizados == ''){
            $required_energizado = "Debe contestar la preguta ¿Estás trabajando o manipulando equipos Energizados?";
        }else {
            if($request->equipos_energizados == 'Si'){
                if (
                    $request->numero_matricula == '' || $request->f4a1 = '' || $request->f4a2 = '' || $request->f4a3 = '' || $request->f4a4 = '' || $request->f4a5 = '' || $request->f4a16 = '' || $request->f4a7 = '' || $request->f4a8 = ''
                ){
                    $form4 = "Es obligatorio a llenar el ítem 4";
                }
            }
        }
        if($request->max_altura == ''){
            $required_max_altura = "Debe contestar la preguta ¿La actividad a realizar es a una altura superior a los 1.5 metros de altura?";
        }else {
            if($request->max_altura == 'Si'){
                if (
                    $request->f2a1 == '' || $request->f2a2 == '' || $request->f2a3 == '' || $request->f2a4 == '' || $request->f2a5 == '' || $request->f2a6 == '' || $request->f2a7 == '' ||$request->documentacion_personal == '' || 
                    $request->f2b1u1 == '' || $request->f2b2u1 == '' || $request->f2b3u1 == '' || $request->f2b4u1 == '' || $request->f2b5u1 == '' || $request->f2b6u1 == '' ||  $request->f2c1u1 == '' || $request->f2c2u1 == '' || $request->f2c4u1 == '' || $request->f2c3u1 == '' ||
                    $request->f2d1 == '' || $request->f2d2 == '' || $request->f2d3 == '' || $request->f2d4 == '' ||
                    $request->f2e1 == '' || $request->f2e2 == '' || $request->f2e3 == '' || $request->f2e4 == '' || $request->f2e5 == '' || $request->f2e6 == '' || $request->f2e7 == ''
                    ){
                    $form2 = "Es obligatorio a llenar el ítem 2";
                }
            }
        }
        if ($required_energizado || $required_max_altura || $required_vehiculo || $form2 || $form4 || $form5 || $form6) {
            return redirect()->back()->withErrors([$required_energizado,$required_max_altura,$required_vehiculo,$form2,$form4,$form5,$form6])->withInput();
        }
        
        if ($request->f8a1 == '' || $request->f8a1 == 'No' || $request->f8a2 == '' || $request->f8a2 == 'No' || $request->f8a3 == '' || $request->f8a3 == 'No' || $request->f8a4 == '' || $request->f8a4 == 'No' || $request->f8a5 == '' || $request->f8a5 == 'No'){
            $form8 = "El ítem 7 de es obligatorio y/o no permite respuesta \"no\" para el envio del formato";
            return redirect()->back()->withErrors([$form8])->withInput();
        }
        if($request->hasFile('foto_motos1')){
            $file = $request->file('foto_motos1');
            $foto_moto1 = time().str_random().'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())
                ->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/work_permit/'.$foto_moto1));
        }
        if($request->hasFile('foto_motos2')){
            $file = $request->file('foto_motos2');
            $foto_moto2 = time().str_random().'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())
                ->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('storage/human_management/work_permit/'.$foto_moto2));

        }
        if($request->hasFile('foto_motos3')){
            $file = $request->file('foto_motos3');
            $foto_moto3 = time().str_random().'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())
                ->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('storage/human_management/work_permit/'.$foto_moto3));
        }
        if($request->hasFile('foto_motos4')){
            $file = $request->file('foto_motos4');
            $foto_moto4 = time().str_random().'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())
                ->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('storage/human_management/work_permit/'.$foto_moto4));
        }

        $request['estado'] = 'Sin aprobar';
        $request['responsable'] = auth()->id();
        $request['foto_moto1'] = $foto_moto1;
        $request['foto_moto2'] = $foto_moto2;
        $request['foto_moto3'] = $foto_moto3;
        $request['foto_moto4'] = $foto_moto4;

        $id = Work1::create($request->all());

        $request['work_id'] = $id->id;

        work1_add::create($request->all());

        if ($request->task_id && $request->task_id != '') {
            Tasking::find($request->task_id)->update([
                'permit_id' => $id->id
            ]);
        }

        if($request->hasFile('archivos')){
            for ($i=0; $i < count($request->file('archivos')); $i++) { 
                $file = $request->file('archivos')[$i];
                $name = time().str_random().'.'.$file->getClientOriginalExtension();
                if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                    Image::make($file->getRealPath())
                        ->resize(null, 500, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save(public_path('storage/human_management/work_permit/'.$name));
                }else{
                    $path = Storage::putFileAs('public/human_management/work_permit', $file, $name);
                }
                $id->files()->create([
                    'nombre'=>$name,
                    'formulario'=>$id->id,
                    'extencion' => $file->getClientOriginalExtension(),
                ]);
            }
        }

        foreach ($request->cedula as $user) {
            $tasking[$user] = Tasking::whereBetween('date_start',[now()->format('Y-m-d 00:00:00'),now()->format('Y-m-d 23:59:59')])->whereHas('users',function ($query) use ($user)
            {
                $query->where('id',$user);
            })->first();

            Responsable::create([
                'user_id' => $user,
                'responsibles_id' => $id->id,
                'responsibles_type' => 'App\Models\Work1',
            ]);
        }

        $arrayId = array();
        $unData = array();
        foreach ($tasking as $key => $value) {
            if ($value) {
                if (array_key_exists($value->id,$arrayId)) {
                    array_push( $arrayId[$value->id] , [ $key => true, 'data' => $value ] );
                }else {
                    $arrayId[$value->id] = [ $key => true ];
                }
            }else {
                $unData[$key] = false;
            }
        }

        if ($unData) {
            // return "Hay funcionarios sin frente de trabajo ";
            // if (count($unData) == count($request->cedula)) {
                
            // }else {
                if ($arrayId) {
                    if (count($arrayId) == 1) {
                        // return "Hay un frente de trabajo, pero no con todos los funcionarios";
                        foreach ($arrayId as $key => $value) {
                            $tasking = Tasking::find($key);
                            foreach ($unData as $ke => $value) {
                                Responsable::create([
                                    'user_id' => $ke,
                                    'responsibles_type' => 'App\Models\Tasking',
                                    'responsibles_id' => $key,
                                ]);
                            }
                            $vehicleVerify = false;
                            foreach ($tasking->vehicles as $key => $value) {
                                if ($value->vehicle->id == $request->vehicle_id) {
                                    $vehicleVerify = true;
                                }
                            }
                            if (!$vehicleVerify) {
                                $tasking->vehicles()->create([
                                    'vehicle_id' => $request->vehicle_id
                                ]);
                            }
                        }
                    }else{
                        // return "Hay varios frentes de trabajo, pero faltan funcionarios";
                        $ready = false;
                        foreach ($arrayId as $key => $value) {
                            if (!$ready) {
                                $tasking = Tasking::find($key);
                                foreach ($unData as $ke => $value) {
                                    Responsable::create([
                                        'user_id' => $ke,
                                        'responsibles_type' => 'App\Models\Tasking',
                                        'responsibles_id' => $key,
                                    ]);
                                }
                                $vehicleVerify = false;
                                foreach ($tasking->vehicles as $key => $value) {
                                    if ($value->vehicle->id == $request->vehicle_id) {
                                        $vehicleVerify = true;
                                    }
                                }
                                if (!$vehicleVerify) {
                                    $tasking->vehicles()->create([
                                        'vehicle_id' => $request->vehicle_id
                                    ]);
                                }
                                $ready = true;
                            }
                        }
                    }
                }else {
                    // return "No hay frente de trabajo";
                    $tasking = Tasking::create([
                        'responsable_id' => auth()->id(),
                        'date_start' => now(),
                        'department' => $request->department,
                        'municipality' => $request->municipality,
                        'project' => 'Otro',
                        'user_inv' => null,
                        'am' => 1,
                        'pm' => 1,
                        'description' => null,
                        'commentaries' => 'Auto del permiso de trabajo '.$id->id,
                        'eb_id' => $request->eb,
                        'station_name' => $request->nombre_eb,
                        'id_beneficiario' => $request->id_beneficiario ? $request->id_beneficiario : null,
                        'lat' => $request->lat,
                        'long' => $request->long,
                        'status' => 2,
                    ]);

                    foreach ($unData as $ke => $value) {
                        Responsable::create([
                            'user_id' => $ke,
                            'responsibles_type' => 'App\Models\Tasking',
                            'responsibles_id' => $key,
                        ]);
                    }
                    $tasking->vehicles()->create([
                        'vehicle_id' => $request->vehicle_id
                    ]);
                }
            // }
        }
        
        $id->coordinadorAcargo->notify(new notificationMain($id->id,'Solicitud de permiso de trabajo '.$id->id,'human_management/work_permit/show/'));
        Mail::send('human_management.work_permit.emails.main', ['format' => $id], function ($menssage) use ($id)
        {
            $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
            $company = general_setting::where('state',1)->pluck('company')->first();
            $email = explode(';',$emails);
            for ($i=0; $i < count($email); $i++) { 
                if($email[$i] != ''){
                    $menssage->to(trim($email[$i]),$company);
                }
            }
            $menssage->to($id->responsableAcargo->email,$id->responsableAcargo->name)->to($id->coordinadorAcargo->email,$id->coordinadorAcargo->name)->subject("Energitelco S.A.S sin aprobar ".$id->id);
        });

        return redirect()->route('work_permit')->with('success','Se ha enviado el formulario correctamente para su aprobación por parte de un coordinador.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Work1::with(['work_add','files',
        'users' => function ($query)
        {
            $query->with('position');
        },'responsableAcargo' => function ($query)
        {
            $query->with('roles');
        },'coordinadorAcargo' => function ($query)
        {
            $query->with('roles');
        }])->find($id);
        return view('human_management.work_permit.show',compact('id'));
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
    public function destroy(Work1 $id)
    {
        $id->delete();
        return redirect()->route('work_permit')->with('success','Se ha eliminado el formato correctamente');
    }
    
    /**
     * Download in pdf the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download(Work1 $id)
    {
        $pdf = PDF::loadView('human_management/work_permit/pdf/main',['trabajo' => $id]);
        return $pdf->download($id->codigo_formulario.'-'.$id->id.'_PERMISO_DE_TRABAJO.pdf');
    }
    
    /**
     * Aprove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, Work1 $id)
    {
        if ($request->status == 'Aprobado') {
            $request->validate([
                'fecha_valido_desde' => 'required',
                'hora_inicio' => 'required',
                'fecha_valido_hasta' => 'required',
                'hora_final' => 'required'
            ]);

            $id->update([
                'estado'=>"Aprobado",
                'fecha_valido_hasta'=>$request->fecha_valido_hasta,
                'fecha_validez_permiso'=>now(),
                'hora_final' => $request->hora_final,
                'fecha_aprobacion'=>now()->format('Y-m-d'),
                'hora_aprobacion'=>now(),
                'fecha_valido_desde'=>$request->fecha_inicio,
                'hora_inicio'=>$request->hora_inicio,
                'coordinador' => auth()->id(),
                'commentary'=>$request->commentary,
            ]);
            
            foreach ($id->users as $user) {
                $user->notify(new notificationMain($id->id,'Se ha aprobado la solicitud de permiso de trabajo '.$id->id,'human_management/work_permit/show/'));
            }

            Mail::send('human_management.work_permit.emails.main', ['format' => $id], function ($menssage) use ($id)
            {
                $emails = system_setting::where('state',1)->pluck('approval_emails')->first();
                $company = general_setting::where('state',1)->pluck('company')->first();
                $email = explode(';',$emails);
                for ($i=0; $i < count($email); $i++) {
                    if($email[$i] != ''){
                        $menssage->to(trim($email[$i]),$company);
                    }
                }
                foreach($id->users as $usuario){
                    $menssage->to($usuario->email,$usuario->name);
                }
                $menssage->subject("Energitelco S.A.S aprobado el PERMISO DE TRABAJO ".$id->id);
            });

            return redirect()->back()->with(['success'=>'Se ha aprobado el permiso de trabajo '.$id->id.' correctamente']);
        }else {
            $id->update([
                'estado'=>"No aprobado",
                'commentary'=>$request->commentary,
                'coordinador' => auth()->id(),
            ]);
    
            foreach ($id->users as $user) {
                // Notification
                $user->notify(new notificationMain($id->id,'No se aprobó la solicitud de permiso de trabajo '.$id->id,'human_management/work_permit/show/'));
                $usuarios[] = $user;
            }
            // Modificar session notificaciones
            if(Session('notificaiones_aprobacion')){
                Session::forget('notificaiones_aprobacion');
            }

            return redirect()->back()->with(['success'=>'Se ha desaprobado el permiso de trabajo correctamente']);
        }
    }
}
