<?php

namespace App\Http\Controllers;

use App\Models\InvUser;
use App\Models\invVehicle;
use App\Models\project\Mintic\Mintic_School;
use App\Models\project\Mintic\inventory\invMinticConsumable;
use App\Models\project\Mintic\inventory\invMinticEquipment;
use App\Models\Responsable;
use App\Models\Tasking;
use App\Models\Work7;
use App\User;
use App\Models\project\Clearing;
use App\Models\project\Mintic\MinticVisit;
use Illuminate\Http\Request;
use App\Models\taskDetailConsumable;
use Carbon\Carbon;

class taskingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de programaciones en frente de trabajo|Ver programaciones en frente de trabajo|Crear programacion en frente de trabajo|Editar programaciones en frente de trabajo', ['only' => ['index']]);
        $this->middleware('permission:Crear programacion en frente de trabajo', ['only' => ['store']]);
        $this->middleware('permission:Editar programaciones en frente de trabajo', ['only' => ['update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taskings = Tasking::get();
        $users = User::where('state',1)->get();
        $mintics = Mintic_School::get();
        $vehicles = invVehicle::get();
        $consumables = invMinticConsumable::where('status',1)->get();
        $equipments = invMinticEquipment::where('status',1)->get();

        $cleaner1 = Clearing::get(['estation_a','id'])->unique('estation_a');
        $cleaner2 = Clearing::get(['estation_b','id'])->unique('estation_b');

        $permissions = Work7::where('fecha_inicio','>=',now()->format('Y-m-d'))->orWhere('fecha_finalizacion','>=',now()->format('Y-m-d'))->get();

        return view('tasking.index',compact('taskings','users','mintics','vehicles','equipments','consumables','permissions','cleaner1','cleaner2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'date_start' => ['required','date'],
            'department' => ['required'],
            'municipality' => ['required'],
            'project' => ['required'],
            'municipality' => ['required'],
        ]);
        $id = Tasking::create([
            'responsable_id' => auth()->id(),
            'date_start' => $request->date_start,
            'department' => $request->department,
            'municipality' => $request->municipality,
            'project' => $request->project,
            'user_inv' => $request->user_inv,
            'am' => (isset($request->am)) ? 1 : 0,
            'pm' => (isset($request->pm)) ? 1 : 0,
            'description' => $request->description,
            'commentaries' => $request->commentaries,
            'eb_id' => $request->eb,
            'station_name' => $request->station_name,
            'lat' => $request->lat,
            'long' => $request->long,
            'status' => 2,
        ]);
        if (
            $request->project == "MINTIC ESTUDIO DE CAMPO"
            || $request->project == "MINTIC TSS EB"
            || $request->project == "MINTIC INSTALACIÓN CENTRO DIGITAL"
            || $request->project == "MINTIC INSTALACIÓN ESTACIÓN BASE"
            || $request->project == "MINTIC INTEGRACIÓN Y ENTREGA CENTRO DIGITAL"
            || $request->project == "MINTIC ENTREGA INTERVENTORIA CENTRO DIGITAL"
            || $request->project == "MINTIC MANTANIMIENTO"
        ){
            $mintic = Mintic_School::where('con_sede',$request->eb)->first();
            if ($mintic) {
                $type = ($request->project == "MINTIC ESTUDIO DE CAMPO" || $request->project == "MINTIC TSS EB") ? 'ec' : (($request->project == "MINTIC INSTALACIÓN CENTRO DIGITAL" || $request->project == "MINTIC INSTALACIÓN ESTACIÓN BASE") ? 'install' : (($request->project == "MINTIC INTEGRACIÓN Y ENTREGA CENTRO DIGITAL" || $request->project == "MINTIC ENTREGA INTERVENTORIA CENTRO DIGITAL") ? 'integration' : 'maintenance'));
                MinticVisit::create([
                    'date'=>Carbon::create($request->date_start)->format('Y-m-d'),
                    'project_id'=>$mintic->id,
                    'time'=>Carbon::create($request->date_start)->format('H:i:s'),
                    'technical_id'=>$request->users[0] ?? null,
                    'commentary'=>'Auto',
                    'type' => $type,
                    'status' => 0
                ]);
            }
        }
        if (isset($request->users)) {
            for ($i=0; $i < count($request->users); $i++) { 
                Responsable::create([
                    'user_id' => $request->users[$i],
                    'responsibles_type' => 'App\Models\Tasking',
                    'responsibles_id' => $id->id,
                ]);
            }
        }
        if (isset($request->vehicles)) {
            for ($i=0; $i < count($request->vehicles); $i++) { 
                if ($request->vehicles[$i]) {
                    $id->vehicles()->create([
                        'vehicle_id' => $request->vehicles[$i]
                    ]);
                }
            }
        }
        if (isset($request->activities)) {
            for ($i=0; $i < count($request->activities); $i++) { 
                if ($request->activities[$i]) {
                    $id->activities()->create([
                        'text' => $request->activities[$i],
                        'status' => 1
                    ]);
                }
            }
        }
        if (isset($request->equipment)) {
            foreach ($request->equipment as $key => $value) {
                $id->consumables()->create([
                    'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                    'inventaryble_id' => $value,
                    'preamount' => 1,
                    'amount' => 0,
                    'status' => 0
                ]);
            }
        }
        if (isset($request->consumable)) {
            foreach ($request->consumable as $key => $value) {
                $id->consumables()->create([
                    'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticConsumable',
                    'inventaryble_id' => $value,
                    'preamount' => $request->amount[$key],
                    'amount' => 0,
                    'status' => 0
                ]);
            }
        }

        return redirect()->route('tasking')->with('success','Se creado la programación correctamente');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tasking $id)
    {
        if (isset($request->add_inv_user)) {
            return $this->addConsumablesUser($request,$id);
        }
        $id->update([
            'responsable_id' => auth()->id(),
            'date_start' => $request->date_start,
            'municipality' => $request->municipality,
            'department' => $request->department,
            'project' => $request->project,
            'eb_id' => $request->eb,
            'am' => (isset($request->am)) ? 1 : 0,
            'pm' => (isset($request->pm)) ? 1 : 0,
            'description' => $request->description,
            'commentaries' => $request->commentaries,
            'report' => $request->report,
            'station_name' => $request->station_name,
            'lat' => $request->lat,
            'long' => $request->long,
            'status' => 2,
        ]);
        Responsable::where('responsibles_type','App\Models\Tasking')->where('responsibles_id',$id->id)->delete();
        if (isset($request->users)) {
            for ($i=0; $i < count($request->users); $i++) {
                Responsable::create([
                    'user_id' => $request->users[$i],
                    'responsibles_type' => 'App\Models\Tasking',
                    'responsibles_id' => $id->id,
                ]);
            }
        }
        $id->vehicles()->delete();
        if (isset($request->vehicles)) {
            for ($i=0; $i < count($request->vehicles); $i++) { 
                $id->vehicles()->create([
                    'vehicle_id' => $request->vehicles[$i]
                ]);
            }
        }
        $id->activities()->delete();
        if (isset($request->activities)) {
            for ($i=0; $i < count($request->activities); $i++) {
                if ($request->activities[$i]) {
                    $id->activities()->create([
                        'text' => $request->activities[$i],
                        'status' => 1
                    ]);
                }
            }
        }
        if (!$id->user_add_inv){
            if (isset($request->equipment)) {
                foreach ($request->equipment as $key => $value) {
                    $detail = taskDetailConsumable::where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id', $value)->where('task_id',$id->id)->first();
                    if ($detail) {
                        $detail->update([
                            'preamount' => 1
                        ]);
                    }else {
                        $id->consumables()->create([
                            'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                            'inventaryble_id' => $value,
                            'preamount' => 1,
                            'amount' => 0,
                            'status' => 0
                        ]);
                    }
                }
            }
            if (isset($request->consumable)) {
                foreach ($request->consumable as $key => $value) {
                    $detail = taskDetailConsumable::where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_id', $value)->where('task_id',$id->id)->first();
                    if ($detail) {
                        $detail->update([
                            'preamount' => $request->amount[$value] + $detail->preamount
                        ]);
                    }else {
                        $id->consumables()->create([
                            'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticConsumable',
                            'inventaryble_id' => $value,
                            'preamount' => $request->amount[$value],
                            'amount' => 0,
                            'status' => 0
                        ]);
                    }
                }
            }
        }

        return redirect()->route('tasking')->with('success','Se editado la programación correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function report(Request $request,Tasking $id)
    {
        $id->update([
            'report_user' => auth()->id(),
            'report' => $request->report,
            'status' => 3
        ]);
        return redirect()->back()->with('success','Se guardado el repote de la programación correctamente');
    }
    
    public function consumables(Request $request,$id)
    {
        if ($equipments = $request->equipment) {
            foreach ($equipments as $key => $value) {
                $inv = InvUser::where('user_id',auth()->id())->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id',$key)->first();
                taskDetailConsumable::find($value)->update([
                    'amount' => 1,
                    'status' => 1
                ]);
                $inv->update([
                    'tickets' => 0,
                    'departures' => 1,
                    'stock' => 0
                ]);
                invMinticEquipment::find($key)->update([
                    'status' => 3
                ]);
            }
        }
        if ($consumables = $request->amount) {
            foreach ($consumables as $key => $value) {
                $inv = InvUser::where('user_id',auth()->id())->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_id',$key)->first();
                taskDetailConsumable::where('task_id',$id)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_id',$key)->update([
                    'amount' => $value,
                    'status' => 1
                ]);
                $inv->gastar($value);
            }
        }
        return redirect()->back()->with('success','Se registrado los consumibles de la programación correctamente');
    }

    public function addConsumablesUser(Request $request,$id)
    {
        $id->update([
            'user_add_inv' => auth()->id(),
            'user_inv' => $request->inv_user,
        ]);
        if (isset($request->equipment)) {
            foreach ($request->equipment as $key => $value) {
                $inv = InvUser::where('user_id',$request->inv_user)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id',$value)->first();
                $detail = taskDetailConsumable::where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id', $value)->where('task_id',$id->id)->first();
                if ($detail) {
                    $detail->update([
                        'preamount' => 1
                    ]);
                }else {
                    $id->consumables()->create([
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                        'inventaryble_id' => $value,
                        'preamount' => 1,
                        'amount' => 0,
                        'status' => 0
                    ]);
                }
                if ($inv) {
                    $inv->entrar(1);
                }else {
                    InvUser::create([
                        'user_id' => $request->inv_user,
                        'inventaryble_id' => $value,
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                        'tickets' => 1,
                        'departures' => 0,
                        'stock' => 1
                    ]);
                }
                invMinticEquipment::find($value)->update([
                    'status' => 2,
                ]);
            }
        }
        if (isset($request->consumable)) {
            foreach ($request->consumable as $key => $value) {
                $detail = taskDetailConsumable::where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_id', $value)->where('task_id',$id->id)->first();
                if ($detail) {
                    $detail->update([
                        'preamount' => $request->amount[$key]
                    ]);
                }else {
                    $id->consumables()->create([
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticConsumable',
                        'inventaryble_id' => $value,
                        'preamount' => $request->amount[$key],
                        'amount' => 0,
                        'status' => 0
                    ]);
                }
                
                $inv = InvUser::where('user_id',$request->inv_user)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_id',$request->consumable[$key])->first();
                if ($inv) {
                    $inv->entrar($request->amount[$key]);
                }else {
                    InvUser::create([
                        'user_id' => $request->inv_user,
                        'inventaryble_id' => $value,
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticConsumable',
                        'tickets' => $request->amount[$key],
                        'departures' => 0,
                        'stock' => $request->amount[$key],
                    ]);
                }
                invMinticConsumable::find($value)->gastar($request->amount[$key]);
            }
        }
        return redirect()->route('tasking')->with('success','Se asignó los consumibles al un técnico correctamente');
    }
}
