<?php

namespace App\Http\Controllers\projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\project\planing\Consumables;
use App\Models\project\planing\ProjectType;

class consumablesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');

        $this->middleware('permission:Lista de consumibles para proyectos|Crear consumibles para proyectos|Ver consumibles para proyectos|Editar consumibles para proyectos',['only' => ['index']]);
        $this->middleware('permission:Crear consumibles para proyectos',['only' => ['create','store']]);
        $this->middleware('permission:Editar consumibles para proyectos',['only' => ['edit','update']]);
        $this->middleware('permission:Ver consumibles para proyectos',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consumables = Consumables::get();
        return view('settings.project.consumables.index',compact('consumables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.project.consumables.create',compact('project_types'));
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
            'description' => ['required','string'],
            'value' => ['required','integer'],
        ]);
        $request['state'] = 1;
        Consumables::create($request->all());
        return redirect()->route('consumables_setting')->with('success','Se ha creado el consumible correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Consumables::with('type_project')->find($id);
        return view('settings.project.consumables.show',compact('id')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Consumables::with('type_project')->find($id);
        $project_types = ProjectType::get();
        return view('settings.project.consumables.edit',compact('id','project_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Consumables $id)
    {
        $request->validate([
            'description' => ['required','string'],
            'value' => ['required','integer'],
            'type' => ['required'],
        ]);
        $id->update($request->all());
        return redirect()->route('consumables_setting')->with('success','Se ha actualizado el consumible correctamente');
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
