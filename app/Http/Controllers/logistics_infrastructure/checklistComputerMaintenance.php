<?php

namespace App\Http\Controllers\logistics_infrastructure;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Work6;
use App\Models\general_setting;
use App\Models\invComputer;
use App\Models\system_setting;
use App\Models\SystemMessages;
use App\Models\work6_add;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use App\Notifications\notificationMain;
use App\User;

class checklistComputerMaintenance extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Aprobar solicitud de lista de verificación para el mantenimiento de computadores|Consultar listas de verificación para el mantenimiento de los computadores|Descargar PDF de listas de verificación para el mantenimiento de los computadores|Digitar formulario de lista de verificación para el mantenimiento de computadores|Eliminar formato de listas de verificación para el mantenimiento de los computadores',['only' => ['index']]);
        $this->middleware('permission:Consultar listas de verificación para el mantenimiento de los computadores',['only' => ['show']]);
        $this->middleware('permission:Descargar PDF de listas de verificación para el mantenimiento de los computadores',['only' => ['download']]);
        $this->middleware('permission:Digitar formulario de lista de verificación para el mantenimiento de computadores',['only' => ['create','store']]);
        $this->middleware('permission:Eliminar formato de listas de verificación para el mantenimiento de los computadores',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar solicitud de lista de verificación para el mantenimiento de computadores',['only' => ['approve']]);
        $this->message = SystemMessages::where('state',1)->where('name','Envio de formatos')->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checklist_computers = Work6::with(['responsableAcargo','coordinadorAcargo'])->get();
        return view('logistics_infrastructure.checklist_computer.index',compact('checklist_computers'));
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
        $computers = invComputer::with('user')->where('status','!=',0)->get();
        return view('logistics_infrastructure.checklist_computer.create',compact('message','usuarios','computers'));
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
            'cedula_tecnico'=>['required'],
            'computer_id'=>['required'],
        ]);

        $com = invComputer::find($request->computer_id);

        $request['responsable_equipo'] = $com->user_id ? $com->user->name : 'Energitelco';

        
        $id = Work6::create($request->all());

        $com->update([
            'commentary' => $com->commentary."\n".now()->format('d-M-Y').": Verificación para el mantenimiento L-FR-06-".$id->id
        ]);
        
        $add = work6_add::create($request->all());

        $add->update([
            'work_id' => $id->id
        ]);

        $id->update([
            'estado'=>'Sin aprobar',
            'responsable'=> auth()->id(),
        ]);
        
        $users = User::where('state',1)->get();
        
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Aprobar solicitud de lista de verificación para el mantenimiento de computadores')){
                $user->notify(new notificationMain($id->id,'Solicitud de mantenimiento de computadores '.$id->id,'logistics_infrastructure/checklist_computer/show/'));
            }
        }
        
        Mail::send('logistics_infrastructure.checklist_computer.mail.main', ['format' => $id], function ($menssage) use ($id)
        {
            $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
            $company = general_setting::where('state',1)->pluck('company')->first();
            $email = explode(';',$emails);
            for ($i=0; $i < count($email); $i++) {
                if($email[$i] != ''){
                    $menssage->to(trim($email[$i]),$company);
                }
            }
            $menssage->subject("Energitelco S.A.S solictud de VERIFICACIÓN PARA EL MANTENIMIENTO DE LOS COMPUTADORES a ".$id->responsable_equipo);
        });

        return redirect()->route('checklist_computer_maintenance')->with('success','Se ha enviado el formulario correctamente para su aprobación por parte de un coordinador.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Work6::with([
            'coordinadorAcargo' =>function ($query)
            {
                $query->with('roles');
            },
            'responsableAcargo' =>function ($query)
            {
                $query->with('roles');
            },
            'tecnico' =>function ($query)
            {
                $query->with('position');
            },
            'work_add',
        ])->find($id);
        return view('logistics_infrastructure.checklist_computer.show',compact('id'));
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
    public function destroy(Work6 $id)
    {
        $id->delete();
        return redirect()->route('checklist_computer_maintenance')->with('success','Se ha eliminado el formato correctamente');
    }

    /**
     * Download in pdf the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download(Work6 $id)
    {
        $pdf = PDF::loadView('logistics_infrastructure/checklist_computer/pdf/main',['trabajo' => $id]);
        return $pdf->download($id->codigo_formulario.'-'.$id->id.'_LISTA_VERIFICACION_PARA_EL_MANTENIMIENTO_DE_LOS_COMPUTADORES.pdf');
    }
    
    /**
     * Aprove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function approve(Request $request,Work6 $id)
    {
        if ($request->status == 'Aprobado') {
            $id->update([
                'estado'=>"Aprobado",
                'commentary'=>$request->commentary,
                'fecha_aprobacion'=>now()->format('Y-m-d'),
                'hora_aprobacion'=>now()->format('H:i:s'),
                'coordinador' => auth()->id(),
            ]);
            
            $id->responsableAcargo->notify(new notificationMain($id->id,'Se ha aprobado la solicitud de mantenimiento de computadores '.$id->id,'logistics_infrastructure/checklist_computer/show/'));
            $id->tecnico->notify(new notificationMain($id->id,'Se ha aprobado la solicitud de mantenimiento de computadores '.$id->id,'logistics_infrastructure/checklist_computer/show/'));
            
            Mail::send('logistics_infrastructure.checklist_computer.mail.main', ['format' => $id], function ($menssage) use ($id)
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
                $menssage->to($usuario->email,$usuario->name)->subject("Energitelco S.A.S L-FR-06 LISTA DE VERIFICACIÓN PARA EL MANTENIMIENTO DE LOS COMPUTADORES EXITOSA ".$id->id);
            });

            return redirect()->route('approval')->with(['success'=>'Se ha aprobado la solicitud '.$id->id.' correctamente','sudmenu' => 6]);
        }else {
            $id->update([
                'estado' => "No aprobado",
                'commentary'=>$request->commentary,
                'coordinador' => auth()->id(),
            ]);
    
            $id->responsableAcargo->notify(new notificationMain($id->id,'No se aprobó la solicitud de mantenimiento de computadores '.$id->id,'logistics_infrastructure/checklist_computer/show/'));
            $id->tecnico->notify(new notificationMain($id->id,'No se aprobó la solicitud de mantenimiento de computadores '.$id->id,'logistics_infrastructure/checklist_computer/show/'));
    
            return redirect()->route('approval')->with(['success'=>'Se ha desaprobado la solicitud correctamente','sudmenu'=>6]);
        }
    }
}
