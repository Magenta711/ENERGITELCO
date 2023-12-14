<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\User;
use App\Models\Work2;
use App\Models\general_setting;
use App\Models\system_setting;
use App\Models\SystemMessages;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use App\Notifications\notificationMain;

class fallProtectionEquipmentInspectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Aprobar solicitud de Inspección y protección contra caídas|Consultar inspecciones de equipos de protección contra caídas|Descargar PDF de inspecciones de equipos de protección contra caídas|Digitar formulario de Inspección de equipos de protección contra caídas|Eliminar formato de inspecciones de equipos de protección contra caídas',['only' => ['index']]);
        $this->middleware('permission:Consultar inspecciones de equipos de protección contra caídas',['only' => ['show']]);
        $this->middleware('permission:Descargar PDF de inspecciones de equipos de protección contra caídas',['only' => ['download']]);
        $this->middleware('permission:Digitar formulario de Inspección de equipos de protección contra caídas',['only' => ['create','store']]);
        $this->middleware('permission:Eliminar formato de inspecciones de equipos de protección contra caídas',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar solicitud de Inspección y protección contra caídas',['only' => ['approve']]);
        $this->message = SystemMessages::where('state',1)->where('name','Envio de formatos')->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fall_protections = Work2::with(['responsableAcargo','coordinadorAcargo'])->get();
        return  view('human_management.fall_proteccion.index',compact('fall_protections'));
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
        return view('human_management.fall_proteccion.create',compact('usuarios','message'));
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
            'cedula_trabajador'=>['required'],
            'cedula_responsable'=>['required'],
            'fecha_inspeccion'=>['required'],
        ]);

        $id= Work2::create($request->all());

        if($request->hasFile('foto_1')){
            $file=$request->file('foto_1');
            $name1= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/fall_protection_equipment/'.$name1));
            }else {
                $file->move(public_path().'/storage/human_management/fall_protection_equipment/',$name1);
            }
        }else {
            $name1 = '';
        }
        if($request->hasFile('foto_2')){
            $file=$request->file('foto_2');
            $name2= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/fall_protection_equipment/'.$name2));
            }else {
                $file->move(public_path().'/storage/human_management/fall_protection_equipment/',$name2);
            }
        }else {
            $name2 = '';
        }
        if($request->hasFile('foto_3')){
            $file=$request->file('foto_3');
            $name3= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/fall_protection_equipment/'.$name3));
            }else {
                $file->move(public_path().'/storage/human_management/fall_protection_equipment/',$name3);
            }
        }else {
            $name3 = '';
        }
        if($request->hasFile('foto_4')){
            $file=$request->file('foto_4');
            $name4= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/fall_protection_equipment/'.$name4));
            }else {
                $file->move(public_path().'/storage/human_management/fall_protection_equipment/',$name4);
            }
        }else {
            $name4 = '';
        }
        if($request->hasFile('foto_5')){
            $file=$request->file('foto_5');
            $name5= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/fall_protection_equipment/'.$name5));
            }else {
                $file->move(public_path().'/storage/human_management/fall_protection_equipment/',$name5);
            }
        }else {
            $name5 = '';
        }
        $id->update([
            'foto_1' => $name1,
            'foto_2' => $name2,
            'foto_3' => $name3,
            'foto_4' => $name4,
            'foto_5' => $name5,
            'responsable' => auth()->id(),
        ]);
        $mensaje = "Estás recibiendo una solicitud de inspección de equipos de protección contra caídas.";

        $users = User::where('state',1)->get();
        
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Aprobar solicitud de Inspección y protección contra caídas')){
                $user->notify(new notificationMain($id->id,'Solicitud de inspección de equipos '.$id->id,'human_management/fall_protection_equipment_inspection/show/'));
            }
        }
        
        Mail::send('human_management.fall_proteccion.email.main', ['format' => $id, 'mensaje' => $mensaje], function ($menssage) use ($id)
        {
            $responsable = User::find($id->responsable);
            $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
            $company = general_setting::where('state',1)->pluck('company')->first();
            $email = explode(';',$emails);
            for ($i=0; $i < count($email); $i++) {
                if($email[$i] != ''){
                    $menssage->to(trim($email[$i]),$company);
                }
            }
            $menssage->to($responsable->email,$responsable->name)->subject("Energitelco S.A.S, INSPECCIÓN DE EQUIPOS DE PROTECCIÓN CONTRA ALTURAS REVISADO.");
        });
        return redirect()->route('fall_protection_equipment_inspection')->with('success','Se ha enviado el formulario correctamente para su aprobación por parte de un coordinador.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Work2::with([
            'trabajador' => function ($query)
            {
                $query->with('position');
            },'inspeccionador' => function ($query)
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
        return view('human_management.fall_proteccion.show',compact('id'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work2 $id)
    {
        $id->delete();
        return redirect()->route('fall_protection_equipment_inspection')->with('success','Se ha eliminado el formato correctamente');
    }

    /**
     * Download in pdf the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function download(Work2 $id)
    {
        $pdf = PDF::loadView('human_management/fall_proteccion/pdf/main',['trabajo' => $id]);
        return $pdf->download($id->codigo_formulario.'-'.$id->id.'_INSPECCION_DE_EQUIPOS_PROTECCION_CONTRA_CAIDAS.pdf');
    }
    
    /**
     * Aprove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function approve(Request $request,Work2 $id)
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

            //Notification
            $id->inspeccionador->notify(new notificationMain($id->id,'Se ha aprobado la solicitud de inspección de equipos de protección contra caídas '.$id->id,'human_management/fall_protection_equipment_inspection/show/'));
            $id->trabajador->notify(new notificationMain($id->id,'Se ha aprobado la inspección de equipos de protección contra caídas '.$id->id,'human_management/fall_protection_equipment_inspection/show/'));
            
            //Correo por si aprueba
            $mensaje = 'Certificación exitosa de equipo de proteción contra caídas.';
            
            Mail::send('human_management.fall_proteccion.email.main', ['format' => $id, 'mensaje'=>$mensaje], function ($menssage) use ($id)
            {
                $emails = system_setting::where('state',1)->pluck('approval_emails')->first();
                $company = general_setting::where('state',1)->pluck('company')->first();
                $email = explode(';',$emails);
                for ($i=0; $i < count($email); $i++) {
                    if($email[$i] != ''){
                        $menssage->to(trim($email[$i]),$company);
                    }
                }
                $menssage->to($id->responsableAcargo->email,$id->responsableAcargo->name)->subject("Energitelco S.A.S, INSPECCIÓN DE EQUIPOS DE PROTECCIÓN CONTRA ALTURAS REVISADO Y CERTIFICADO EXITOSA.");
            });
            
            return redirect()->back()->with(['success'=>'Se ha aprobado la la inspección de equipos de protección contra caídas '.$id->id.' correctamente']);
        }else {
            $id->update([
                'estado'=>"No aprobado",
                'commentary'=>$request->commentary,
                'coordinador' => auth()->id(),
            ]);

            //Notification
            $id->inspeccionador->notify(new notificationMain($id->id,'No se aprobó la solicitud de inspección de equipos de protección contra alturas '.$id->id,'human_management/fall_protection_equipment_inspection/show/'));
            $id->trabajador->notify(new notificationMain($id->id,'No se aprobó la inspección de equipos de protección contra alturas '.$id->id,'human_management/fall_protection_equipment_inspection/show/'));

            return redirect()->back()->with(['success'=>'Se ha desaprobado la inspección de equipos de protección contra caídas '.$id->id.' correctamente']);
        }
    }
}
