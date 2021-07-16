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
use Illuminate\Http\Request;
use App\Models\project\route\Routes;
use App\Models\taskDetailConsumable;

class taskingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
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
        return $request;
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
                    'inventaryble_id' => $key,
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
                    'inventaryble_id' => $key,
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
        for ($i=0; $i < count($request->users); $i++) {
            Responsable::create([
                'user_id' => $request->users[$i],
                'responsibles_type' => 'App\Models\Tasking',
                'responsibles_id' => $id->id,
            ]);
        }
        $id->vehicles()->delete();
        if (count($request->vehicles)) {
            for ($i=0; $i < count($request->vehicles); $i++) { 
                $id->vehicles()->create([
                    'vehicle_id' => $request->vehicles[$i]
                ]);
            }
        }
        $id->activities()->delete();
        if (count($request->activities)) {
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
                // $inv = InvUser::where('user_id',$request->inv_user)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id',$key)->first();
                $detail = taskDetailConsumable::where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id', $key)->where('task_id',$id->id)->first();
                if ($detail) {
                    $detail->update([
                        'preamount' => 1
                    ]);
                }else {
                    $id->consumables()->create([
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                        'inventaryble_id' => $key,
                        'preamount' => 1,
                        'amount' => 0,
                        'status' => 0
                    ]);
                }
                // if ($inv) {
                //     $inv->update([
                //         'tickets' => 1,
                //         'departures' => 0,
                //         'stock' => 1
                //     ]);
                // }else {
                //     InvUser::create([
                //         'user_id' => $request->inv_user,
                //         'inventaryble_id' => $key,
                //         'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                //         'tickets' => 1,
                //         'departures' => 0,
                //         'stock' => 1
                //     ]);
                // }
                // invMinticEquipment::find($key)->update([
                //     'status' => 2,
                // ]);
            }
        }
        if (isset($request->consumable)) {
            foreach ($request->consumable as $key => $value) {
                // $inv = InvUser::where('user_id',$request->inv_user)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_id',$request->consumable[$key])->first();
                $detail = taskDetailConsumable::where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_id', $key)->where('task_id',$id->id)->first();
                if ($detail) {
                    $detail->update([
                        'preamount' => $request->amount[$key] + $detail->preamount
                    ]);
                }else {
                    $id->consumables()->create([
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticConsumable',
                        'inventaryble_id' => $key,
                        'preamount' => $request->amount[$key],
                        'amount' => 0,
                        'status' => 0
                    ]);
                }
                
                // if ($inv) {
                //     $inv->update([
                //         'tickets' => $request->amount[$key] + $inv->tickets,
                //         'stock' => $request->amount[$key] + $inv->stock
                //     ]);
                // }else {
                //     InvUser::create([
                //         'user_id' => $request->inv_user,
                //         'inventaryble_id' => $key,
                //         'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticConsumable',
                //         'tickets' => $request->amount[$key],
                //         'departures' => 0,
                //         'stock' => $request->amount[$key],
                //     ]);
                // }
                // $consumable = invMinticConsumable::find($key);
                // $rest = $consumable->stock - $request->amount[$key];
                // $consumable->update([
                //     'stock' => $rest,
                //     'departures' => $request->amount[$key] + $consumable->departures,
                //     'status' => $rest == 0 ? 0 : 1,
                // ]);
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
    
    public function consumables(Request $request,Tasking $id)
    {
        if ($equipments = $request->equipment) {
            foreach ($equipments as $key => $value) {
                $inv = InvUser::where('user_id',auth()->id())->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id',$key)->first();
                $id->consumables()->create([
                    'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                    'inventaryble_id' => $key,
                    'amount' => 1,
                    'status' => 1
                ]);
                $inv->update([
                    'tickets' => 0,
                    'departures' => 1,
                    'stock' => 0
                ]);
            }
        }
        if ($consumables = $request->consumable) {
            foreach ($consumables as $key => $value) {
                $inv = InvUser::where('user_id',auth()->id())->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_id',$request->consumable[$key])->first();
                $id->consumables()->create([
                    'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticConsumable',
                    'inventaryble_id' => $key,
                    'amount' => $request->amount[$key],
                    'status' => 1
                ]);
                $inv->update([
                    'departures' => $inv->departures + $request->amount[$key],
                    'stock' => $inv->stock - $request->amount[$key]
                ]);
            }
        }
        return redirect()->back()->with('success','Se registrado los consumibles de la programación correctamente');
    }

    public function addConsumablesUser(Request $request,$id)
    {
        $id->update([
            'user_add_inv' => auth()->id()
        ]);
        if (isset($request->equipment)) {
            foreach ($request->equipment as $key => $value) {
                $inv = InvUser::where('user_id',$request->inv_user)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id',$key)->first();
                $detail = taskDetailConsumable::where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id', $key)->where('task_id',$id->id)->first();
                if ($detail) {
                    $detail->update([
                        'preamount' => 1
                    ]);
                }else {
                    $id->consumables()->create([
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                        'inventaryble_id' => $key,
                        'preamount' => 1,
                        'amount' => 0,
                        'status' => 0
                    ]);
                }
                if ($inv) {
                    $inv->update([
                        'tickets' => 1,
                        'departures' => 0,
                        'stock' => 1
                    ]);
                }else {
                    InvUser::create([
                        'user_id' => $request->inv_user,
                        'inventaryble_id' => $key,
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                        'tickets' => 1,
                        'departures' => 0,
                        'stock' => 1
                    ]);
                }
                invMinticEquipment::find($key)->update([
                    'status' => 2,
                ]);
            }
        }
        if (isset($request->consumable)) {
            foreach ($request->consumable as $key => $value) {
                $inv = InvUser::where('user_id',$request->inv_user)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_id',$request->consumable[$key])->first();
                $detail = taskDetailConsumable::where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_id', $key)->where('task_id',$id->id)->first();
                if ($detail) {
                    $detail->update([
                        'preamount' => $detail->preamount
                    ]);
                }else {
                    $id->consumables()->create([
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticConsumable',
                        'inventaryble_id' => $key,
                        'preamount' => $request->amount[$key],
                        'amount' => 0,
                        'status' => 0
                    ]);
                }
                
                if ($inv) {
                    $inv->update([
                        'tickets' => $request->amount[$key] + $inv->tickets,
                        'stock' => $request->amount[$key] + $inv->stock
                    ]);
                }else {
                    InvUser::create([
                        'user_id' => $request->inv_user,
                        'inventaryble_id' => $key,
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticConsumable',
                        'tickets' => $request->amount[$key],
                        'departures' => 0,
                        'stock' => $request->amount[$key],
                    ]);
                }
                $consumable = invMinticConsumable::find($key);
                $rest = $consumable->stock - $request->amount[$key];
                $consumable->update([
                    'stock' => $rest,
                    'departures' => $request->amount[$key] + $consumable->departures,
                    'status' => $rest == 0 ? 0 : 1,
                ]);
            }
        }
        return redirect()->route('tasking')->with('success','Se asigno los consumibles a un tecnico');
    }
}
