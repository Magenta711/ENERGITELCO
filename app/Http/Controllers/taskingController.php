<?php

namespace App\Http\Controllers;

use App\Models\InvUser;
use App\Models\invVehicle;
use App\Models\project\Mintic\inventory\invMinticConsumable;
use App\Models\project\Mintic\inventory\invMinticEquipment;
use App\Models\project\Mintic\Mintic_School;
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
        $users = User::where('state',1)->get();
        $mintics = Mintic_School::get();
        $works = Work1::get();
        $vehicles = invVehicle::get();
        $consumables = invMinticConsumable::where('status',1)->get();
        $equipments = invMinticEquipment::where('status',1)->get();
        return view('tasking.index',compact('users','mintics','works','vehicles','equipments','consumables'));
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
        $id = Tasking::create([
            'responsable_id' => auth()->id(),
            'date_start' => $request->date_start,
            'municipality' => $request->municipality,
            'department' => $request->department,
            'project_id' => $request->project_id,
            'eb_id' => $request->eb,
            'am' => (isset($request->am)) ? 1 : 0,
            'pm' => (isset($request->pm)) ? 1 : 0,
            'description' => $request->description,
            'commentaries' => $request->commentaries,
            'report' => $request->report,
            'status' => 2,
        ]);

        for ($i=0; $i < count($request->user); $i++) { 
            $id->users()->create([
                'user_id' => $request->user[$i]
            ]);
        }
        for ($i=0; $i < count($request->vehicles); $i++) { 
            $id->vehicles()->create([
                'user_id' => $request->vehicles[$i]
            ]);
        }
        for ($i=0; $i < count($request->vehicles); $i++) { 
            $id->vehicles()->create([
                'user_id' => $request->vehicles[$i]
            ]);
        }
        for ($i=0; $i < count($request->activities); $i++) { 
            $id->activities()->create([
                'text' => $request->activities[$i],
                'status' => 1
            ]);
        }
        for ($i=0; $i < count($request->equipments); $i++) { 
            $inv = InvUser::where('user_id',$request->inv_user)->where('inventaryble_id','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_type',$request->equipments[$i])->first();
            if ($inv) {
                $Inv->update([
                    'tickets' => 1,
                    'departures' => 0,
                    'stock' => 1
                ]);
            }else {
                InvUser::create([
                    'tickets' => 1,
                    'departures' => 0,
                    'stock' => 1
                ]);
            }
        for ($i=0; $i < count($request->consumable); $i++) { 
            $inv = InvUser::where('user_id',$request->inv_user)->where('inventaryble_id','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_type',$request->consumable[$i])->first();
            if ($inv) {
                $inv->update([
                    'tickets' => $request->amount[$request->consumable[$i]] + $inv->tickets,
                    'stock' => $request->amount[$request->consumable[$i]] + $inv->stock
                ]);
            }else {
                InvUser::create([
                    'tickets' => $request->amount[$request->consumable[$i]],
                    'departures' => 0,
                    'stock' => $request->amount[$request->consumable[$i]],
                ]);
            }
        }

        
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
    public function destroy($id)
    {
        //
    }
}
