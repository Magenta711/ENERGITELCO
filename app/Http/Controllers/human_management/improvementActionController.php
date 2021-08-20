<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use App\Models\human_magement\improvementAction;
use App\Models\human_magement\improvementActionDetail;
use App\Models\human_magement\improvementActionDetailUser;
use App\User;

class improvementActionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de acciones de mejora|Crear acciones de mejora|Ver acciones de mejora|Editar acciones de mejora|Descargar acciones de mejora|Eliminar acciones de mejora|Aprobar acciones de mejora',['only' => ['index']]);
        $this->middleware('permission:Crear acciones de mejora',['only' => ['create','store']]);
        $this->middleware('permission:Ver acciones de mejora',['only' => ['show']]);
        $this->middleware('permission:Editar acciones de mejora',['only' => ['edit','update']]);
        $this->middleware('permission:Descargar acciones de mejora',['only' => ['download']]);
        $this->middleware('permission:Eliminar acciones de mejora',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $improvements = improvementAction::get();
        return view('human_management.improvement_action.index',compact('improvements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('state',1)->get();
        return view('human_management.improvement_action.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['responsable_id'] = auth()->id();
        $request['status'] = 2;
        $improvement = improvementAction::create($request->all());
        $status = 1;
        foreach ($request->action as $key => $value) {
            $detail = improvementActionDetail::create([
                'improvement_id' => $improvement->id,
                'text' => $request->action[$key],
                'start_date' => $request->start_date_action[$key],
                'end_date' => $request->end_date_action[$key],
                'type' => 'action',
                'status' => 1
            ]);
            for ($j=0; $j < count($request->user_action_id[$key]); $j++) { 
                improvementActionDetailUser::create([
                    'user_id' => $request->user_action_id[$key][$j],
                    'detail_id' => $detail->id
                ]);
            }
        }
        foreach ($request->tracing as $key => $value) { 
            if (!$request->end_date_tracing[$key]) {
                $status = 0;
            }
            $detail = improvementActionDetail::create([
                'improvement_id' => $improvement->id,
                'text' => $request->tracing[$key],
                'start_date' => $request->start_date_tracing[$key],
                'end_date' => $request->end_date_tracing[$key],
                'type' => 'tracing',
                'status' => 1
            ]);
            if (isset($request->user_tracing_id[$key]) && $request->user_tracing_id[$key] != '') {
                for ($j=0; $j < count($request->user_tracing_id[$key]); $j++) { 
                    improvementActionDetailUser::create([
                        'user_id' => $request->user_tracing_id[$key][$j],
                        'detail_id' => $detail->id
                    ]);
                }
            }
        }

        if ($status) {
            $improvement->update([
                'status' => 1
            ]);
        }

        return redirect()->route('improvement_action')->with('success','Se ha creado la acción correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(improvementAction $id)
    {
        return view('human_management.improvement_action.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(improvementAction $id)
    {
        $users = User::where('state',1)->get();
        return view('human_management.improvement_action.edit',compact('id','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, improvementAction $id)
    {
        $id->update($request->all());
        $amount_action = count($request->action);
        $amount_tracing = count($request->tracing);
        $amuont_all = ($amount_action) + $amount_tracing;
        $i = 0;
        improvementActionDetail::where('improvement_id',$id->id)->update([ 'status' => 0 ]);
        $action_ready = 0;
        $tracing_ready = 0;
        $status = 1;
        foreach ($id->details as $key => $detail) {
            improvementActionDetailUser::where('detail_id',$detail->id)->delete();
            if ($i < $amount_action) {
                $j = 0;
                foreach ($request->action as $key => $item) {
                    if ($j == $i) {
                        $detail->update([
                            'text' => $request->action[$key],
                            'start_date' => $request->start_date_action[$key],
                            'end_date' => $request->end_date_action[$key],
                            'type' => 'action',
                            'status' => 1
                        ]);
                        if (isset($request->user_action_id[$key]) && $request->user_action_id[$key] != '') {
                            for ($h=0; $h < count($request->user_action_id[$key]); $h++) { 
                                improvementActionDetailUser::create([
                                    'user_id' => $request->user_action_id[$key][$h],
                                    'detail_id' => $detail->id
                                ]);
                            }
                        }
                        $action_ready++;
                    }
                    $j++;
                }
            }else {
                if (isset($j)) {
                    $j = $action_ready;
                }else {
                    $j = 0;
                }
                foreach ($request->tracing as $key => $item) {
                    if ($j == $i) {
                        if (!$request->end_date_tracing[$key]) {
                            $status = 0;
                        }
                        $detail->update([
                            'text' => $request->tracing[$key],
                            'start_date' => $request->start_date_tracing[$key],
                            'end_date' => $request->end_date_tracing[$key],
                            'type' => 'tracing',
                            'status' => 1
                        ]);
                        if (isset($request->user_tracing_id[$key]) && $request->user_tracing_id[$key] != '') {
                            for ($h=0; $h < count($request->user_tracing_id[$key]); $h++) { 
                                improvementActionDetailUser::create([
                                    'user_id' => $request->user_tracing_id[$key][$h],
                                    'detail_id' => $detail->id,
                                ]);
                            }
                        }
                        $tracing_ready++;
                    }
                    $j++;
                }
            }
            $i++;
        }
        improvementActionDetail::where('improvement_id',$id->id)->where('status',0)->delete();
        if ($i < $amuont_all) {
            if ($i < $amount_action) {
                foreach ($request->action as $key => $value) {
                    if ($j >= $action_ready) {
                        $detail = improvementActionDetail::create([
                            'improvement_id' => $id->id,
                            'text' => $request->action[$key],
                            'start_date' => $request->start_date_action[$key],
                            'end_date' => $request->end_date_action[$key],
                            'type' => 'action',
                            'status' => 1,
                        ]);
                        if (isset($request->user_action_id[$key]) && $request->user_action_id[$key] != '') {
                            for ($h=0; $h < count($request->user_action_id[$key]); $h++) { 
                                improvementActionDetailUser::create([
                                    'user_id' => $request->user_action_id[$key][$h],
                                    'detail_id' => $detail->id,
                                ]);
                            }
                        }
                    }
                    $j++;
                }
            }
            $j = 0;
            foreach ($request->tracing as $key => $value) { 
                if ($j >= $tracing_ready) {
                    if (!$request->end_date_tracing[$key]) {
                        $status = 0;
                    }
                    $detail = improvementActionDetail::create([
                        'improvement_id' => $id->id,
                        'text' => $request->tracing[$key],
                        'start_date' => $request->start_date_tracing[$key],
                        'end_date' => $request->end_date_tracing[$key],
                        'type' => 'tracing',
                        'status' => 1
                    ]);
                    if (isset($request->user_tracing_id[$key]) && $request->user_tracing_id[$key] != '') {
                        for ($h=0; $h < count($request->user_tracing_id[$key]); $h++) {
                            improvementActionDetailUser::create([
                                'user_id' => $request->user_tracing_id[$key][$h],
                                'detail_id' => $detail->id
                            ]);
                        }
                    }
                }
                $j++;
            }
        }

        if ($status) {
            $id->update([
                'status' => 1
            ]);
        }

        return redirect()->route('improvement_action')->with('success','Se ha actualizado la acción correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(improvementAction $id)
    {
        $id->delete();
        return redirect()->route('improvement_action')->with('success','Se ha eliminado la acción correctamente');
    }

    public function download(improvementAction $id)
    {
        $pdf = PDF::loadView('human_management.improvement_action.pdf.main',compact('id'));
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download($id->id.'_ACCION_DE_MEJORA.pdf');
    }
}
