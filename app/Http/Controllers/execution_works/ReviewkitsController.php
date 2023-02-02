<?php

namespace App\Http\Controllers\execution_works;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\execution_work\kits;
use App\Models\execution_work\tools;
use App\Models\execution_work\assigment;
use App\Models\execution_work\tools_add;
use App\User;

class ReviewkitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {   
        // ahhh
        // $assigment = assigment::with(['asignado', 'kit_asignado', 'responsable'])->get();
        #Aquí se debe listar es los user status 1 osea activo, condicionar que tenga asignaciones
        $users = User::where('state',1)->get();
        return view('execution_works.review_assignment.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function review($id)
    {   
        // $id = assigment::find($id);
        // $assigment = assigment::with(['asignado', 'kit_asignado', 'responsable'])->get();
        #Traido entonces el ID del user
        $user = User::find($id);
        return view('execution_works.review_assignment.review', compact(['user']));
    }

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
        //
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
