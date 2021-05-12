<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Work5;
use App\User;
use App\Models\general_setting;
use App\Models\system_setting;
use App\Models\SystemMessages;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use App\Notifications\notificationMain;

class deliveryStaffingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Aprobar solicitud de entrega de dotación personal|Consultar entrega de dotación personal|Descargar PDF de entrega de dotación personal|Digitar formulario de entrega de dotación personal|Eliminar formato de entrega de dotación personal',['only' => ['index']]);
        $this->middleware('permission:Consultar entrega de dotación personal',['only' => ['show']]);
        $this->middleware('permission:Descargar PDF de entrega de dotación personal',['only' => ['download']]);
        $this->middleware('permission:Digitar formulario de entrega de dotación personal',['only' => ['create','store']]);
        $this->middleware('permission:Eliminar formato de entrega de dotación personal',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar solicitud de entrega de dotación personal',['only' => ['approve']]);
        $this->message = SystemMessages::where('state',1)->where('name','Envio de formatos')->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delivery_staffings = Work5::with(['responsableAcargo','coordinadorAcargo'])->get();
        return  view('human_management.delivery_staffing.index',compact('delivery_staffings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::where('state',1)->get();
        $message = $this->message;
        return  view('human_management.delivery_staffing.create',compact('usuarios','message'));
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
            'cedula_empleado'=>['required'],
        ]);
        $request['estado'] = 'Sin aprobar';
        $request['responsable'] = auth()->id();
        $id= Work5::create($request->all());

        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Aprobar solicitud de entrega de dotación personal')){
                $user->notify(new notificationMain($id->id,'Solicitud de entrega de dotación '.$id->id,'human_management/delivery_staffing/show/'));
            }
        }
        
        Mail::send('human_management.delivery_staffing.mail.main', ['format' => $id], function ($menssage) use ($id)
        {
            $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
            $company = general_setting::where('state',1)->pluck('company')->first();
            $email = explode(';',$emails);
            for ($i=0; $i < count($email); $i++) { 
                if($email[$i] != ''){
                    $menssage->to(trim($email[$i]),$company);
                }
            }
            $menssage->subject("Energitelco S.A.S solictud de ENTREGA DE DOTACIÓN PERSONAL A ".$id->id);
        });

        return redirect()->route('delivery_staffing')->with('success','Se ha enviado el formulario correctamente para su aprobación por parte de un coordinador.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Work5::with([
            'empleado' => function ($query)
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
        return  view('human_management.delivery_staffing.show',compact('id'));
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
    public function destroy(Work5 $id)
    {
        $id->delete();
        return redirect()->route('delivery_staffing')->with('success','Se ha eliminado el formato correctamente');
    }

    /**
     * Download in pdf the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function download(Work5 $id)
    {
        $pdf = PDF::loadView('human_management/delivery_staffing/pdf/main',['trabajo' => $id]);
        return $pdf->download($id->codigo_formulario.'-'.$id->id.'_ENTREGA_DE_DOTACION_PERSONAL.pdf');
    }
    
    /**
     * Aprove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function approve(Request $request,Work5 $id)
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
    
            $id->responsableAcargo->notify(new notificationMain($id->id,'Se ha aprobado la solicitud de entrega de dotación '.$id->id,'human_management/delivery_staffing/show/'));
            $id->empleado->notify(new notificationMain($id->id,'Se ha aprobado la solicitud de entrega de dotación '.$id->id,'human_management/delivery_staffing/show/'));
            
            Mail::send('human_management.delivery_staffing.mail.main', ['format' => $id], function ($menssage) use ($id)
            {
                $emails = system_setting::where('state',1)->pluck('approval_emails')->first();
                $company = general_setting::where('state',1)->pluck('company')->first();
                $email = explode(';',$emails);
                for ($i=0; $i < count($email); $i++) {
                    if($email[$i] != ''){
                        $menssage->to(trim($email[$i]),$company);
                    }
                }
                $menssage->to($id->responsableAcargo->email,$id->responsableAcargo->name)->subject("Energitelco S.A.S H-FR-09 ENTREGA DE DOTACIÓN PERSONAL EXITOSA ".$id->id);
            });
            return redirect()->route('approval')->with(['success'=>'Se ha aprobado la solicitud '.$id->id.' correctamente','sudmenu' => 5]);
        }else {
            $id->update([
                'estado' => "No aprobado",
                'commentary' => $request->commentary,
                'coordinador' => auth()->id(),
            ]);
            
            $id->responsableAcargo->notify(new notificationMain($id->id,'No se aprobó la solicitud de entrega de dotación '.$id->id,'human_management/delivery_staffing/show/'));
            $id->empleado->notify(new notificationMain($id->id,'No se aprobó la solicitud de entrega de dotación '.$id->id,'human_management/delivery_staffing/show/'));
            
            return redirect()->route('approval')->with(['success'=>'Se ha desaprobado la solicitud correctamente','sudmenu'=>5]);
        }
    }
}
