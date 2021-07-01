<?php

namespace App\Http\Controllers;

use App\Models\InvUser;
use App\Models\invVehicle;
use App\Models\project\Mintic\inventory\invMinticConsumable;
use App\Models\project\Mintic\inventory\invMinticEquipment;
use App\Models\project\Mintic\Mintic_School;
use App\Models\Responsable;
use App\Models\Tasking;
use App\Models\Work1;
use App\User;
use Illuminate\Http\Request;

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
        $works = Work1::get();
        $vehicles = invVehicle::get();
        $consumables = invMinticConsumable::where('status',1)->get();
        $equipments = invMinticEquipment::where('status',1)->get();
        return view('tasking.index',compact('taskings','users','mintics','works','vehicles','equipments','consumables'));
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
        $id = Tasking::create([
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
            'status' => 2,
        ]);

        for ($i=0; $i < count($request->users); $i++) { 
            Responsable::create([
                'user_id' => $request->users[$i],
                'responsibles_type' => 'App\Models\Tasking',
                'responsibles_id' => $id->id,
            ]);
        }
        for ($i=0; $i < count($request->vehicles); $i++) { 
            $id->vehicles()->create([
                'vehicle_id' => $request->vehicles[$i]
            ]);
        }
        for ($i=0; $i < count($request->activities); $i++) { 
            $id->activities()->create([
                'text' => $request->activities[$i],
                'status' => 1
            ]);
        }
        $id->eb()->create([
            'projectble_id' => $request->eb,
            'projectble_type' => 'App\Models\project\Mintic\Mintic_School',
        ]);
        if ($request->equipments) {
            for ($i=0; $i < count($request->equipments); $i++) {
                $inv = InvUser::where('user_id',$request->inv_user)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id',$request->equipments[$i])->first();
                if ($inv) {
                    $inv->update([
                        'tickets' => 1,
                        'departures' => 0,
                        'stock' => 1
                    ]);
                }else {
                    InvUser::create([
                        'user_id' => $request->inv_user,
                        'inventaryble_id' => $request->equipments[$i],
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                        'tickets' => 1,
                        'departures' => 0,
                        'stock' => 1
                    ]);
                }
            }
        }
        if (isset($request->consumable)) {
            for ($i=0; $i < count($request->consumable); $i++) { 
                $inv = InvUser::where('user_id',$request->inv_user)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_id',$request->consumable[$i])->first();
                if ($inv) {
                    $inv->update([
                        'tickets' => $request->amount[$request->consumable[$i]] + $inv->tickets,
                        'stock' => $request->amount[$request->consumable[$i]] + $inv->stock
                    ]);
                }else {
                    InvUser::create([
                        'user_id' => $request->inv_user,
                        'inventaryble_id' => $request->equipments[$i],
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticConsumable',
                        'tickets' => $request->amount[$request->consumable[$i]],
                        'departures' => 0,
                        'stock' => $request->amount[$request->consumable[$i]],
                    ]);
                }
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
        for ($i=0; $i < count($request->vehicles); $i++) { 
            $id->vehicles()->create([
                'vehicle_id' => $request->vehicles[$i]
            ]);
        }
        $id->activities()->delete();
        for ($i=0; $i < count($request->activities); $i++) {
            $id->activities()->create([
                'text' => $request->activities[$i],
                'status' => 1
            ]);
        }
        $id->eb()->update([
            'projectble_id' => $request->eb,
            'projectble_type' => 'App\Models\project\Mintic\Mintic_School',
        ]);

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
}
