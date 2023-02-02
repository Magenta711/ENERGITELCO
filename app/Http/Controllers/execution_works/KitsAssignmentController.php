<?php

namespace App\Http\Controllers\execution_works;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\execution_work\kits;
use App\Models\execution_work\tools;
use App\Models\execution_work\assigment;
use App\Models\execution_work\tools_add;
use App\User;

class KitsAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de asignación|Ver asignación|Editar asignación',['only' => ['index']]);
        $this->middleware('permission:Ver asignación',['only' => ['show']]);
        $this->middleware('permission:Editar asignación',['only' => ['edit','update']]);
        $this->middleware('permission:Crear asignación',['only' => ['assignment','store']]);
        $this->middleware('permission:Revisar asignación',['only' => ['review']]);
    }

    public function index()
    {
        $assigment = assigment::with(['asignado', 'kit_asignado', 'responsable'])->get();
        $kits = kits::with(['responsable','estado_kit'])->get();
        return view('execution_works.kits_assignment.index', compact(['kits','assigment']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Sección de crear
    public function create()
    {
        $usuarios = User::where('state',1)->with('roles')->get();
        return view('execution_works.kits.create', compact('usuarios'));
    }

    //Sección de asignación
    public function assignment()
    {   
        // $id = kits::find($id);
        $kits = kits::where('estado_id',2)->where('responsable_id',auth()->id())->get();
        $usuarios = User::where('state',1)->with('roles')->get();
        return view('execution_works.kits.assigment', compact('usuarios', 'kits'));
    }

    //sección de revisión
    public function review()
    {
        $usuarios = User::where('state',1)->with('roles')->get();
        return view('execution_works.kits.review', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'cedula_revisor' => ['required'],
            'unique_kit' => ['required']
        ]);
        $assigment=assigment::create([
            'id_kit'=>$request->unique_kit,
            'id_asignado' => $request->cedula_revisor,
            'id_responsable' => auth()->id()
        ]);
        if (isset($request->item) && $request->item) {
            for ($j=1; $j <= count($request->item); $j++) {
                $tools_add = tools_add::create([
                    'id_asignado'=>$assigment->id,  
                    'nombre' => $request->item[$j],
                    'cantidad' => $request->amount[$j],
                    'marca' => $request->marca[$j],
                    'Observaciones' => $request->observacion[$j],
                ]);
            }
        }

        Kits::find($request->unique_kit)->update([
            'estado_id' => 1
        ]);
        return redirect()->route('kits_assigment')->with('success','Se ha creado la asignación de herramientas correctamente correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = assigment::find($id);
        return view('execution_works.kits_assignment.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = User::where('state',1)->with('roles')->get();
        $id = assigment::find($id);
        return view('execution_works.kits_assignment.edit', compact('id','usuarios'));
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
        assigment::find($id)->update($request->all());
        tools_add::where('id_asignado',$id)->delete();
        for ($j=1; $j <= count($request->item); $j++) {
            $tools_add = tools_add::create([
                'id_asignado' => $id, 
                'nombre' => isset($request->item[$j]) ? $request->item[$j] : null,
                'cantidad' => isset($request->amount[$j]) ? $request->amount[$j] : null,
                'marca' => isset($request->marca[$j]) ? $request->marca[$j] : null,
                'Observaciones' => isset($request->observaciones[$j]) ? $request->observaciones[$j] : null,
            ]);
        }
        return redirect()->route('kits_assignment_show', $id)->with('success','Se ha editado la asignación correctamente'); 
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
