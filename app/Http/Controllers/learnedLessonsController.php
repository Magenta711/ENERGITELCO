<?php

namespace App\Http\Controllers;

use App\Models\LearnedLeassons;
use Illuminate\Http\Request;

class learnedLessonsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de lesiones aprendidas|Crear lesiones aprendidas|Editar lesiones aprendidas|Eliminar lesiones aprendidas|Ver lesiones aprendidas',['only' => ['index']]);
        $this->middleware('permission:Crear lesiones aprendidas',['only' => ['create','store']]);
        $this->middleware('permission:Editar lesiones aprendidas',['only' => ['edit','update']]);
        $this->middleware('permission:Ver lesiones aprendidas',['only' => ['show']]);
        $this->middleware('permission:Eliminar lesiones aprendidas',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = LearnedLeassons::get();
        return view('learned_lessons.index',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('learned_lessons.create');
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
            'date' => ['required'],
            'num' => ['required']
        ]);
        $request['responsable_id'] = auth()->id();
        LearnedLeassons::create($request->all());

        return redirect()->route('learned_lessons')->with('success','Se ha creado la lección aprendida correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LearnedLeassons $id)
    {
        return view('learned_lessons.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LearnedLeassons $id)
    {
        return view('learned_lessons.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LearnedLeassons $id)
    {
        $request->validate([
            'date' => ['required'],
            'num' => ['required']
        ]);
        $id->update($request->all());
        return redirect()->route('learned_lessons')->with('success','Se ha actualizado la lección aprendida correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LearnedLeassons $id)
    {
        $id->delete();
        return redirect()->route('learned_lessons')->with('success','Se ha eliminado la lección aprendida correctamente');
    }
}
