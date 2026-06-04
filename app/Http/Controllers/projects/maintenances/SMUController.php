<?php

namespace App\Http\Controllers\projects\maintenances;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\project\msu\msu_campus;


class SMUController extends Controller
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
        $sedes=msu_campus::get();
        return view('execution_works.maintenance.index', compact('sedes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('state',1)->get();
        return view('execution_works.maintenance.create', compact('users'));
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
            'id_sede'=>['required'],
            'site_name' => ['required'],
            'mun' => ['required'],
            'dep' => ['required'],
            'long' => ['required'],
            'lat' => ['required'],
            'OT' => ['required'],
            'plants_amount' => ['required'],
        ]);

        msu_campus::create($request->all());

        return  redirect()->route('SMU')->with('success','Se ha creado el proyecto correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(msu_campus $id)
    {
        // return $id;
        return view('execution_works.maintenance.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, msu_campus $id)
    {
        $request->validate([
            'id_sede'=>['required'],
            'site_name' => ['required'],
            // 'mun' => ['required'],
            'dep' => ['required'],
            'long' => ['required'],
            'lat' => ['required'],
            'OT' => ['required'],
            'plants_amount' => ['required'],
        ]);

        $id->update($request->all());

        return  redirect()->route('SMU')->with('success','Se ha actualizado el proyecto correctamente');
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
