<?php

namespace App\Http\Controllers;

use App\Exports\markeRrfExport;
use App\Models\project\planing\Consumables;
use App\Models\project\planing\Deliverable;
use App\Models\project\planing\makeupsRf;
use App\Models\project\planing\Material;
use App\Models\project\planing\PaymentLimit;
use App\Models\project\planing\ProjectActivities;
use App\Models\project\planing\ProjectType;
use App\Models\project\planing\Project;
use App\Models\Positions;
use App\Models\project\planing\MakeupMw_1_1;
use App\Models\project\planing\MakeupMw_1_2;
use App\Models\project\planing\MakeupMw_1_3;
use App\Models\project\planing\MakeupMw_1_4;
use App\Models\project\planing\MakeupMw_1_5;
use App\Models\project\planing\MakeupMw_2_1;
use App\Models\project\planing\MakeupMw_2_2;
use App\Models\project\planing\MakeupMw_3;
use App\Models\Responsable;
use App\Models\project\planing\commission_technical;
use App\Models\project\planing\CommissionControl;
use App\Models\project\planing\CommissionControlEjecution;
use App\Models\project\planing\CommissionControlNotification;
use App\Notifications\notificationMain;
use App\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use DateTime;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de proyectos|Ver proyectos|Crear proyectos|Editar proyectos|Aprobar proyectos|Eliminar proyectos',['only' => ['index']]);
        $this->middleware('permission:Crear proyectos', ['only' => ['create','store']]);
        $this->middleware('permission:Editar proyectos', ['only' => ['edit','update']]);
        $this->middleware('permission:Ver proyectos', ['only' => ['show']]);

        $this->middleware('permission:Lista de comisiones para coordinadores de proyectos|Crear comisiones de control de proyectos|Ver comisiones de control de proyectos|Editar comisiones de control de proyectos',['only' => ['setting_bonuses_control']]);
        $this->middleware('permission:Crear comisiones de control de proyectos',['only' => ['setting_bonuses_create_control','setting_bonuses_store_control']]);
        $this->middleware('permission:Editar comisiones de control de proyectos',['only' => ['setting_bonuses_edit_control','setting_bonuses_update_control']]);
        $this->middleware('permission:Ver comisiones de control de proyectos',['only' => ['setting_bonuses_show_control']]);

        $this->middleware('permission:Lista de comisiones para técnicos de proyectos|Crear comisiones para técnicos de proyectos|Ver comisiones para técnicos de proyectos|Editar comisiones para técnicos de proyectos',['only' => ['setting_bonuses_technical']]);
        $this->middleware('permission:Crear comisiones para técnicos de proyectos',['only' => ['setting_bonuses_create_technical','setting_bonuses_store_technical']]);
        $this->middleware('permission:Editar comisiones para técnicos de proyectos',['only' => ['setting_bonuses_edit_technical','setting_bonuses_update_technical']]);
        $this->middleware('permission:Ver comisiones para técnicos de proyectos',['only' => ['setting_bonuses_show_technical']]);

        

        $this->middleware('permission:Lista de materiales para proyectos|Crear materiales para proyectos|Ver materiales para proyectos|Editar materiales para proyectos',['only' => ['setting_materials']]);
        $this->middleware('permission:Crear materiales para proyectos',['only' => ['setting_materials_create','setting_materials_store']]);
        $this->middleware('permission:Editar materiales para proyectos',['only' => ['setting_materials_edit','setting_materials_update']]);
        $this->middleware('permission:Ver materiales para proyectos',['only' => ['setting_materials_show']]);

        $this->middleware('permission:Lista de actividades de proyectos|Crear actividades de proyecto|Ver actividades de proyecto|Editar actividades de proyecto',['only' => ['setting']]);
        $this->middleware('permission:Crear actividades de proyecto',['only' => ['setting_create','setting_store']]);
        $this->middleware('permission:Editar actividades de proyecto',['only' => ['setting_edit','setting_update']]);
        $this->middleware('permission:Ver actividades de proyecto',['only' => ['setting_show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('responsable')->get();
        return view('projects.index',compact('projects'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = ProjectActivities::where('state',1)->get();
        $materials = Material::with('consumables')->get();
        $consumables = Consumables::get();
        $makeups_rf = makeupsRf::get();

        return view('projects.create',compact('projects','materials','consumables','makeups_rf'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $end_date = null;
        $end_time = null;
        if ($request->start_date && $request->start_time) {
            $days = bcdiv($request->total_days_project , "1", 0);
            $hours = bcdiv(($request->total_days_project - $days) * 8 , "1", 0);
            $minutes = round( ( ( ($request->total_days_project - $days) * 8) - $hours) * 60);
            
            $end_date = date("Y-m-d",strtotime($request->start_date."+ ".$days." days"));
    
            $end_time = date("H:i", strtotime($request->start_time." + ".$hours." hour"));
            $end_time = date("H:i", strtotime($end_time." + ".$minutes." minute"));
            
            // Horario de trabajo => traer de la base de datos
            $from = strtotime("08:00");
            $to = strtotime("17:00");
    
            if (strtotime($end_time) >= $from && strtotime($end_time) <= $to) {
                
            }else{
                // Si las horas pasan a 8 hacer
                $v = date("Y-m-d",strtotime($end_date."+ 1 days"));
                $end = $from + (strtotime($end_time) - $to);
                $end_time = date('H:i',$end);
            }
        }
        //Storege main
        $request['responsable_id'] = auth()->id();
        $request['end_date'] = $end_date;
        $request['end_time'] = $end_time;
        $request['rf'] = ($request->rf) ? '1' : '0';
        $request['mw'] = ($request->mw) ? '2' : '0';
        $request['state'] = ($request->btnSubmit == "Enviar y firmar") ? 'Sin aprobar' : 'Guardado';

        $project = Project::create($request->all());

        $project->assingTimePlanning($request->id_item,$request->amount,$request->total_days,$request->time,$request->total_check_days,$request->phase_item,$request->comentaries);
        $project->assingTimeControl($request->number_hours,$request->delivery_feedback);
        $project->assingMaterialsRf($request->material_rf);
        $project->assingMeasuredRf($request->measured_rf);
        $project->assingMaterialsMw($request->material_mw);
        $project->assingMeasuredMw($request->measured_mw);
        $project->assingLength($request->length);
        $project->assingTagsRf($request->questions,$request->sector);
        $request['project_id'] = $project->id;
        $request['state'] = 0;
        $MakeupMw_1_1 = MakeupMw_1_1::create($request->all());
        $MakeupMw_1_2 = MakeupMw_1_2::create($request->all());
        $MakeupMw_1_3 = MakeupMw_1_3::create($request->all());
        $MakeupMw_1_4 = MakeupMw_1_4::create($request->all());
        $MakeupMw_1_5 = MakeupMw_1_5::create($request->all());
        $MakeupMw_2_1 = MakeupMw_2_1::create($request->all());
        $MakeupMw_2_2 = MakeupMw_2_2::create($request->all());
        $MakeupMw_3 = MakeupMw_3::create($request->all());
        $state_1 = 0;
        $state_2 = 0;
        $state_3 = 0;
        $state_4 = 0;
        $state_5 = 0;
        if($request->type_marke_mw){
            for ($i=0; $i < count($request->type_marke_mw); $i++) { 
                if ($request->type_marke_mw[$i] == 1) {
                    $state_1 = 1;
                }
                if ($request->type_marke_mw[$i] == 2) {
                    $state_2 = 1;
                }
                if ($request->type_marke_mw[$i] == 3) {
                    $state_3 = 1;
                }
                if ($request->type_marke_mw[$i] == 4) {
                    $state_4 = 1;
                }
                if ($request->type_marke_mw[$i] == 5) {
                    $state_5 = 1;
                }
            }
        }
        $MakeupMw_1_1->update(['state' => $state_1]);
        $MakeupMw_1_2->update(['state' => $state_2]);
        $MakeupMw_1_3->update(['state' => $state_3]);
        $MakeupMw_1_4->update(['state' => $state_4]);
        $MakeupMw_1_5->update(['state' => $state_5]);
        $MakeupMw_2_1->update(['state' => "1"]);
        $MakeupMw_2_2->update(['state' => "1"]);
        $MakeupMw_3->update(['state' => "1"]);

        if ($request->btnSubmit == "Enviar y firmar") {
            $users = User::where('state',1)->get();
            foreach ($users as $user) {
                if ($user->hasPermissionTo('Aprobar proyectos')) {
                    $user->notify(new notificationMain($project->id,'Nueva planeación de proyecto por aprobar '.$project->id,'projects/'));
                }
            }
        }else {
            $users = User::where('state',1)->get();
            foreach ($users as $user) {
                if ($user->hasPermissionTo('Lista de proyectos')) {
                    $user->notify(new notificationMain($project->id,'Nueva planeación de proyecto guardo '.$project->id,'projects/'));
                }
            }
        }

        return redirect()->route('project')->with('success','Se ha creado el proyecto correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consumables = Consumables::get();
        $id = Project::with(['project','responsable','time_controls','MakeupMw_1_1','MakeupMw_1_2','MakeupMw_2_1','MakeupMw_2_2','MakeupMw_3','MakeupMw_1_3','MakeupMw_1_4','MakeupMw_1_5','lenght',
        'consumables' => function ($query)
        {
            $query->with(['material'=>function ($query)
            {
                $query->with('consumables');
            }]);
        },
        'permissions' => function ($query)
        {
            $query->with('responsableAcargo');
        },
        'time_plannings'=>function ($query)
        {
            $query->with(['activity' => function ($query)
            {
                $query->with('deliverables');
            }]);
        },])->find($id);
        $commissions = [
            ['name' => 'Juan Esteban', 'value' => 30000, 'of' => 1, 'to' => 5, 'type' => 'Control', 'state' => 'Aplica'],
            ['name' => 'Example', 'value' => 20000, 'of' => 1, 'to' => 5, 'type' => 'Ejecución', 'state' => 'Aplica'],
            ['name' => 'Marcela', 'value' => 20000, 'of' => 1, 'to' => 5, 'type' => 'Ejecución', 'state' => 'Aplica']
        ];
        // dd($commissions);
        return view('projects.show',compact('id','consumables','commissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Validate 
        $id = Project::with(['project','responsable','time_controls','MakeupMw_1_1','MakeupMw_1_2','MakeupMw_2_1','MakeupMw_2_2','MakeupMw_3','MakeupMw_1_3','MakeupMw_1_4','MakeupMw_1_5','lenght',
            'consumables' => function ($query)
            {
                $query->with(['material'=>function ($query)
                {
                    $query->with('consumables');
                }]);
            },
            'permissions' => function ($query)
            {
                $query->with('responsableAcargo');
            },
            'time_plannings'=>function ($query)
            {
                $query->with(['activity' => function ($query)
                {
                    $query->with('deliverables');
                }]);
            },
        ])->find($id);
        if ($id->state != "Terminado" && $id->state != 'Suspendido'){
            $projects = ProjectActivities::where('state',1)->get();
            $materials = Material::get();
            $consumables = Consumables::get();
            $makeups_rf = makeupsRf::get();
            return view('projects.edit',compact('id','projects','materials','consumables','makeups_rf'));
        }
        return redirect()->route('home')->with('success','No tienes acceso a esta página.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $id)
    {
        return $request;
        $end_date = null;
        $end_time = null;
        if ($request->start_date && $request->start_time) {
            $days = bcdiv($request->total_days_project , "1", 0);
            $hours = bcdiv(($request->total_days_project - $days) * 8 , "1", 0);
            $minutes = round( ( ( ($request->total_days_project - $days) * 8) - $hours) * 60);
            
            $end_date = date("Y-m-d",strtotime($request->start_date."+ ".$days." days"));
    
            $end_time = date("H:i", strtotime($request->start_time." + ".$hours." hour"));
            $end_time = date("H:i", strtotime($end_time." + ".$minutes." minute"));
    
            // Horario de trabajo => traer de la base de datos
            $from = strtotime("08:00");
            $to = strtotime("17:00");
    
            if (strtotime($end_time) >= $from && strtotime($end_time) <= $to) {
                
            }else{
                // Si las horas pasan a 8 hacer
                $v = date("Y-m-d",strtotime($end_date."+ 1 days"));
                $end = $from + (strtotime($end_time) - $to);
                $end_time = date('H:i',$end);
            }
        }
        
        $status = ($id->state == "Enviar y firmar" || $id->state == 'Guardado') ? (($request->btnSubmit == "Enviar y firmar") ? 'Sin aprobar' : 'Guardado') : $id->state;

        //Storege main        
        $id->update($request->all());

        $id->update([
            'end_date' => $end_date,
            'end_time' => $end_time,
            'rf' => ($request->rf) ? '1' : '0',
            'mw' => ($request->mw) ? '2' : '0',
            'state' => $status,
            'whitOVP' => 0,
            'whitPower' => 0,
            'sector_1' => 0,
            'sector_2' => 0,
            'sector_3' => 0,
            'sector_4' => 0,
        ]);

        $id->editAssingTimePlanning($request->id_item,$request->amount,$request->total_days,$request->time,$request->total_check_days,$request->phase_item,$request->comentaries);
        $id->editAssingTimeControl($request->number_hours,$request->delivery_feedback);
        $id->editAssingMaterialsRf($request->material_rf);
        $id->editAssingMeasuredRf($request->measured_rf);
        $id->editAssingMaterialsMw($request->material_mw);
        $id->editAssingMeasuredMw($request->measured_mw);
        $id->editAssingLength($request->length);
        $id->assingTagsRf($request->questions,$request->sector);
        $id->editAssingDeliverables($request->deliverable_project,$request->deliverable);
        $id->MakeupMw_1_1->update($request->all());
        $id->MakeupMw_1_2->update($request->all());
        $id->MakeupMw_1_3->update($request->all());
        $id->MakeupMw_1_4->update($request->all());
        $id->MakeupMw_1_5->update($request->all());
        $id->MakeupMw_2_1->update($request->all());
        $id->MakeupMw_2_2->update($request->all());
        $id->MakeupMw_3->update($request->all());
        $state_1 = 0;
        $state_2 = 0;
        $state_3 = 0;
        $state_4 = 0;
        $state_5 = 0;
        if($request->type_marke_mw){
            for ($i=0; $i < count($request->type_marke_mw); $i++) { 
                if ($request->type_marke_mw[$i] == 1) {
                    $state_1 = 1;
                }
                if ($request->type_marke_mw[$i] == 2) {
                    $state_2 = 1;
                }
                if ($request->type_marke_mw[$i] == 3) {
                    $state_3 = 1;
                }
                if ($request->type_marke_mw[$i] == 4) {
                    $state_4 = 1;
                }
                if ($request->type_marke_mw[$i] == 5) {
                    $state_5 = 1;
                }
            }
        }
       $id->MakeupMw_1_1->update(['state' => $state_1]);
       $id->MakeupMw_1_2->update(['state' => $state_2]);
       $id->MakeupMw_1_3->update(['state' => $state_3]);
       $id->MakeupMw_1_4->update(['state' => $state_4]);
       $id->MakeupMw_1_5->update(['state' => $state_5]);
       $id->MakeupMw_2_1->update(['state' => "1"]);
       $id->MakeupMw_2_2->update(['state' => "1"]);

        if ($id->state == "Enviar y firmar" || $id->state == 'Guardado') {
           if ($request->btnSubmit == "Enviar y firmar") {
            $users = User::where('state',1)->get();
            foreach ($users as $user) {
                if ($user->hasPermissionTo('Aprobar proyectos')) {
                    $user->notify(new notificationMain($id->id,'Planeación de proyecto por aprobar '.$id->id,'projects/'));
                }
            }
            }else {
                $users = User::where('state',1)->get();
                foreach ($users as $user) {
                    if ($user->hasPermissionTo('Lista de proyectos')) {
                        $user->notify(new notificationMain($id->id,'Planeación de proyecto guardo '.$id->id,'projects/'));
                    }
                }
            }
        }

        return redirect()->route('project')->with('success','Se ha editado el proyecto correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $id)
    {
        Responsable::where('responsibles_type','App\Models\Project')->where('responsibles_id',$id->id)->delete();

        $id->delete();
        return redirect()->route('project')->with('success','Se elimino el proyecto correctamente');
    }

    public function reactive(Request $request,Project $id)
    {
        $id->update([ 'accepted_percentage' => $request->accepted_percentage ]);
        $id->responsable->notify(new notificationMain($id->id,'Planeación de proyecto reactivado '.$id->id,'projects/'));
        return redirect()->route('project')->with('success','Proyecto se actualizo el porcentaje permitido correctamente');
    }

    public function finish(Request $request,Project $id)
    {
        $id->update([ 'state' => 'Terminado', 'final_percentage' => $request->final_percentage ]);
        return redirect()->route('project')->with('success','Se ha terminado el proyecto conrectamente');
    }

    public function stop(Project $id)
    {
        $id->update([ 'state' => 'Suspendido','suspension_date' => now() ]);
        $id->responsable->notify(new notificationMain($id->id,'Planeación de proyecto suspendido '.$id->id,'projects/'));
        return redirect()->route('project')->with('success','Proyecto se suspendido el projecto correctamente');
    }
    
    public function start(Project $id)
    {
        $date1 = new DateTime($id->suspension_date);
        $date2 = new DateTime('now');
        // cuantos tiempo estuvo sus pendido
        $diff = $date1->diff($date2);
        
        $hours = ($diff->d * 8)+$diff->h+(($diff->i / 60));
        
        $days = $hours / 8;

        $end_date = Carbon::create($id->end_date)->addDays(($diff->d * 8));
        $end_time = Carbon::create($id->end_time)->addHours($diff->h)->addMinutes($diff->i)->format('h:i:s');
        
        $id->update([
            'state' => 'Aprobado',
            'days_suspension' => $days,
            'end_date' => $end_date,
            'end_time' => $end_time
        ]);

        $id->responsable->notify(new notificationMain($id->id,'Planeación de proyecto reactivado '.$id->id,'projects/'));
        
        return redirect()->route('project')->with('success','Proyecto se reactivo el projecto correctamente');
    }

    public function approve(Project $id)
    {
        $id->update(['state'=>'Aprobado']);
        $id->responsable->notify(new notificationMain($id->id,'Planeación de proyecto aprobado '.$id->id,'projects/'));
        return redirect()->back()->with(['success'=>'Proyecto aprobado correctamente']);
    }
    
    public function not_approve(Project $id)
    {
        $id->update(['state'=>'No aprobado']);
        $id->responsable->notify(new notificationMain($id->id,'Planeación de proyecto no aprobado '.$id->id,'projects/'));
        return redirect()->back()->with(['success'=>'Proyecto no aprobado correctamente']);
    }

    public function download_mw(Project $id)
    {
        // return view('pdf.marquilla_mw',compact('id'));
        $pdf = PDF::loadView('pdf/marquilla_mw',[ 'id' => $id ]);
        $pdf->download($id->project_name.'_marquillas_mw.pdf');
        return response()->json([
            'succes' => 'Se exporto'
        ]);
    }

    public function download_rf($id)
    {
        return (new markeRrfExport($id))->download(time().'_marquillas_rf.xlsx');
    }


    public function setting()
    {
        $projects = ProjectActivities::get();
        return view('settings.project.index',compact('projects'));
    }

    public function setting_create()
    {
        $project_types = ProjectType::get();
        $paymentLimitis = PaymentLimit::where('state',1)->get();
        $deliverables = Deliverable::where('state',1)->get();
        return view('settings.project.create',compact('project_types','paymentLimitis','deliverables'));
    }
    
    public function setting_store(Request $request)
    {
        $request->validate([
            'description',
            'project_type',
            'deliverable_id' => 'required',
            'time' => 'required',
            'payment_limit_id' => 'required',
        ]);
        $request['state'] = 1;
        $id = ProjectActivities::create($request->all());
        $id->assignDeliverable($request->deliverable_id);
        $id->assignPayment($request->payment_limit_id,$request->time);
        return redirect()->route('project_setting')->with('success','Se creo la actividad correctamente');
    }

    public function setting_show($id)
    {
        $id = ProjectActivities::with(['deliverables','PaymentLimit'])->find($id);
        return view('settings.project.show',compact('id'));
    }

    public function setting_edit($id)
    {
        $id = ProjectActivities::with(['deliverables','PaymentLimit'])->find($id);
        $project_types = ProjectType::get();
        $paymentLimitis = PaymentLimit::where('state',1)->get();
        $deliverables = Deliverable::where('state',1)->get();
        return view('settings.project.edit',compact('id','project_types','paymentLimitis','deliverables'));
    }

    public function setting_update(Request $request,ProjectActivities $id)
    {
        $request->validate([
            'state',
            'description',
            'project_type',
            'deliverable_id' => 'required',
            'time' => 'required',
            'payment_limit_id' => 'required',
        ]);

        $id->update($request->all());
        
        $id->assignDeliverable($request->deliverable_id);
        $id->assignPayment($request->payment_limit_id,$request->time);
        
        return redirect()->route('project_setting')->with('success','Se actualizo la actividad correctamente');
    }

    public function setting_materials()
    {
        $materials = Material::where('state',1)->get();
        return view('settings.project.materials.index',compact('materials'));
    }
    
    public function setting_materials_create()
    {
        $materials = Material::get();
        $project_types = ProjectType::get();
        $consumables = Consumables::get();
        return view('settings.project.materials.create',compact('project_types','consumables','materials'));
    }

    public function setting_materials_store(Request $request)
    {
        $request->validate([
            'description' => ['required'],
            'place' => ['required'],
            'project_type' => ['required'],
            'hasLength' => ['required'],
        ]);
        
        $id = Material::create($request->all());
        
        $request->consumable ? $id->assignConsumable($request->consumable,$request->formula) : '';
        
        return redirect()->route('materials_setting')->with('success','Se ha creado el material correctamente');
    }

    public function setting_materials_show($id)
    {
        $id = Material::with(['consumables','project_types'])->find($id);
        return view('settings.project.materials.show',compact('id'));
    }

    public function setting_materials_edit(Material $id)
    {   
        $materials = Material::get();
        $project_types = ProjectType::get();
        $consumables = Consumables::get();
        return view('settings.project.materials.edit',compact('id','project_types','consumables','materials'));
    }

    public function setting_materials_update(Request $request,Material $id)
    {
        $request->validate([
            'description' => ['required'],
            'place' => ['required'],
            'project_type' => ['required'],
            'hasLength' => ['required'],
        ]);

        $id->update($request->all());

        $request->consumable ? $id->assignConsumable($request->consumable,$request->formula) : '';
        
        return redirect()->route('materials_setting')->with('success','Se ha actualizado el material correctamente');
    }

    //Bonuses

    public function setting_bonuses()
    {
        return view('settings.project.bonus.index');
    }
    
    public function setting_bonuses_control()
    {
        $commisions = CommissionControl::get();
        return view('settings.project.bonus.control.index',compact('commisions'));
    }

    public function setting_bonuses_create_control()
    {
        $projects = ProjectActivities::get();
        return view('settings.project.bonus.control.create',compact('projects'));
    }
    
    public function setting_bonuses_store_control(Request $request)
    {
        $commission = CommissionControl::create([
            'project_id' => $request->project_id,
            'status' => 1
        ]);
        for ($i=0; $i < count($request->of); $i++) { 
            CommissionControlEjecution::create([
                'commission_id' => $commission->id,
                'of' => $request->of[$i],
                'to' => $request->to[$i],
                'concept' => $request->concept_ejecution[$i],
                'value' => $request->value[$i],
                'i' => $i,
                'status' => 1
            ]);
        }
        for ($i=0; $i < count($request->ok); $i++) {
            CommissionControlNotification::create([
                'commission_id' => $commission->id,
                'ok' => $request->ok[$i],
                'to_ok' => $request->to_ok[$i],
                'concept' => $request->concept_notification[$i],
                'value' => $request->value_notification[$i],
                'i' => $i,
                'status' => 1
            ]);
        }

        return redirect()->route('setting_bonuses_control')->with('success','Se ha creado la comicion de control correctamente');
    }

    public function setting_bonuses_show_control( CommissionControl $id)
    {
        return view('settings.project.bonus.control.show',compact('id'));
    }

    public function setting_bonuses_edit_control(CommissionControl $id)
    {
        $projects = ProjectActivities::get();
        return view('settings.project.bonus.control.edit',compact('id','projects'));
    }

    public function setting_bonuses_update_control(Request $request, CommissionControl $id)
    {
        $id->update([
            'project_id' => $request->project_id,
            'status' => 1
        ]);
        CommissionControlEjecution::where('commission_id')->update([
            'status' => 0
        ]);
        CommissionControlNotification::where('commission_id')->update([
            'status' => 0
        ]);
        for ($i=0; $i < count($request->of); $i++) { 
            CommissionControlEjecution::updateOrCreate(
            [
                'commission_id' => $id->id,
                'i' => $i
            ],    
            [
                'of' => $request->of[$i],
                'to' => $request->to[$i],
                'concept' => $request->concept_ejecution[$i],
                'value' => $request->value[$i],
                'status' => 1,
            ]);
        }
        CommissionControlEjecution::where('status',0)->delete();
        for ($i=0; $i < count($request->ok); $i++) {
            CommissionControlNotification::updateOrCreate(
            [
                'commission_id' => $id->id,
                'i' => $i
            ],
            [
                'ok' => $request->ok[$i],
                'to_ok' => $request->to_ok[$i],
                'concept' => $request->concept_notification[$i],
                'value' => $request->value_notification[$i],
                'status' => 1,
            ]);
        }
        CommissionControlNotification::where('status',0)->delete();

        return redirect()->route('setting_bonuses_control')->with('success','Se ha creado la comicion de control correctamente');
    }
    
    public function setting_bonuses_technical()
    {
        $commission_technicals = commission_technical::with('position')->get();
        return view('settings.project.bonus.technical.index',compact('commission_technicals'));
    }
    
    public function setting_bonuses_create_technical()
    {
        $positions = Positions::where('description','Técnico')->get();
        return view('settings.project.bonus.technical.create',compact('positions'));
    }
    
    public function setting_bonuses_store_technical(Request $request)
    {
        $request->validate([
            'position_id' => ['required','unique:commission_technicals,position_id'],
            'value' => ['required','integer'],
            'days' => ['required','integer'],
        ]);
        commission_technical::create($request->all());
        return redirect()->route('setting_bonuses_technical')->with('success','Se creado la comisión correctamente');
    }

    public function setting_bonuses_show_technical(commission_technical $id)
    {
        return view('settings.project.bonus.technical.show',compact('id'));
    }

    public function setting_bonuses_edit_technical(commission_technical $id)
    {
        $positions = Positions::where('description','Técnico')->get();
        return view('settings.project.bonus.technical.edit',compact('id','positions'));
    }
    
    public function setting_bonuses_update_technical(Request $request, commission_technical $id)
    {
        $request->validate([
            'position_id' => ['required','unique:commission_technicals,position_id,'.$id->id],
            'value' => ['required','integer'],
            'days' => ['required','integer'],
        ]);
        $id->update($request->all());
        return redirect()->route('setting_bonuses_technical')->with('success','Se editado la comisión correctamente');
    }
}