<?php

namespace App\Http\Controllers;

use App\Models\invVehicle;
use App\Models\project\Mintic\inventory\invMinticConsumable;
use App\Models\project\Mintic\inventory\invMinticEquipment;
use App\Models\project\Mintic\Mintic_School;
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
