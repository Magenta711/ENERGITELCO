<?php

namespace App\Http\Controllers\execution_works;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\execution_work\kits;
use App\Models\execution_work\tools;
use App\Models\execution_work\assigment;
use App\Models\execution_work\tools_add;
use App\Models\execution_work\review_tools;
use App\Models\execution_work\review_kits;
use App\Models\execution_work\review_tools_kits;
use App\Models\execution_work\review_tool_add_kits;
use Carbon\Carbon;
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
        $this->middleware('permission:Revisar asignación|Ver revisión|Crear revisión',['only' => ['index']]);
        $this->middleware('permission:Ver revisión',['only' => ['show']]);
        $this->middleware('permission:Crear revisión',['only' => ['store','review']]);
    }

    public function index()
    {
        // ahhh
        // $assigment = assigment::with(['asignado', 'kit_asignado', 'responsable'])->get();
        #Aquí se debe listar es los user status 1 osea activo, condicionar que tenga asignaciones
        // $users = User::where('state',1)->get();
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
        // return $user->assigment_kits[0]->kit_asignado->review_kits;
        // $review_kits = review_kits::find();
        $review_tools = review_tools::with(['revision','revisor'])->get();

        return view('execution_works.review_assignment.review', compact(['user','review_tools']));
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
        $request->validate([
            'date_review'=> ['required'],
            'commentary'=> ['required']
        ]);
        // return $request;
        $review_tools = review_tools::create([
            'id_asignado'=> $request->id_user,
            'id_revisor'=> auth()->user()->id,
            'fecha_revision'=> $request -> date_review,
        ]);
        for ($k=0; $k < count($request->kit_id); $k++) {
            $review_kit = review_kits::find($request->kit_id[$k]);
            $review_kit = review_kits::create([
                'id_review'=>$review_tools->id,
                'id_kit' => $request->kit_id[$k],
                'comentario'=>$review_kit->commentary.Carbon::create(now())->format('Y-m-d').': '.$request->commentary[$k],
                // 'comentario'=> $request -> commentary[$k],
            ]);
            for ($i=0; $i < count($request->herramienta_id[$k]); $i++) {
                if ($request->observacion_tool[$k][$i] != ""){
                $tool = tools::find($request->herramienta_id[$k][$i]);
                $tool->update([
                    // 'Observaciones'=>$tool->Observaciones.Carbon::create(now())->format('Y-m-d').' '.$request->observacion_tool[$k][$i],
                    'Observaciones'=>$request->observacion_tool[$k][$i],
                ]);
                }
                $review_tools = review_tools_kits::create([
                    'id_review'=>$review_tools->id,
                    'id_kit'=> $request->kit_id[$k],
                    'id_tool'=>$request->herramienta_id[$k][$i],
                    'estado'=>$request->status_tools[$k][$i],
                    'comentario'=>$request->observacion_tool[$k][$i],
                ]);
            }
            // return $request;
            if (isset($request->herramienta_extra_id[$k])){
                for ($n=0; $n < count($request->herramienta_extra_id[$k]); $n++) {
                    if ($request->observacion_extra[$k][$n] != ""){
                        $tool_add = tools_add::find($request->herramienta_extra_id[$k][$n]);
                        $tool_add->update ([
                            'Observaciones'=>$request->observacion_extra[$k][$n]
                    ]);
                    }
                    $review_tools_add = review_tool_add_kits::create([
                        'id_review'=>$review_tools->id,
                        'id_kit'=>$request->kit_id[$k],
                        'id_tool_add'=>$request->herramienta_extra_id[$k][$n],
                        'estado'=>$request->status_tools_add[$k][$n],
                        'comentario'=>$request->observacion_extra[$k][$n],
                    ]);
                }
            }
            //
        }
        return redirect()->route('kits_review')->with('success','Se ha revisado la asignación correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $review_tools = review_tools::with(['revision','revisor'])->where('id_asignado',$id)->latest()->first();
        // return $review_tools;

        return view('execution_works.review_assignment.show', compact(['user','review_tools']));
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
