<?php

namespace App\Http\Controllers\execution_works;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\execution_work\invTool;
use App\User;

class invToolController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista inventario de herramientas|Editar inventario de herramientas|Ver inventario de herramientas|Crear inventario de herramientas|Eliminar inventario de herramientas',['only' => ['index']]);
        $this->middleware('permission:Ver inventario de herramientas',['only' => ['show']]);
        $this->middleware('permission:Crear inventario de herramientas',['only' => ['create','store']]);
        $this->middleware('permission:Eliminar inventario de herramientas',['only' => ['destroy']]);
        $this->middleware('permission:Editar inventario de herramientas',['only' => ['edit','update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tools = invTool::get();
        return view('execution_works.inventory.index',compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('state',1)->get();
        return view('execution_works.inventory.create',compact('users'));
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
            'serial' => ['required','unique:inv_tools,serial'],
            'name' => ['required']
        ]);
        $br = '';
        $commentary = '';
        if ($request->commentary) {
            $commentary = now()->format('Y-m-d h:i:s').' '.$request->commentary;
            $br = "\n";
        }
        
        if ($request->user_id) {
            $request['status'] = 0;
            $user = User::find($request->user_id);
            $commentary = $commentary . $br.now()->format('Y-m-d h:i:s').' se suministra la herramienta a '.$user->name;
        }else {
            $request['status'] = 1;
        }

        $request['commentary'] = $commentary;

        invTool::create($request->all());

        return redirect()->route('inventory_tools')->with('success','Se ha guardado la herramienta correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(invTool $id)
    {
        return view('execution_works.inventory.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(invTool $id)
    {
        $users = User::where('state',1)->get();
        return view('execution_works.inventory.edit',compact('users','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,invTool $id)
    {
        $request->validate([
            'serial' => ['required','unique:inv_tools,serial,'.$id->id],
            'name' => ['required']
        ]);
        $commentary = $id->commentary;
        $br = '';
        if ($commentary) {
            $br = "\n";
        }
        if ($request->commentary) {
            $commentary = $commentary.$br. now()->format('Y-m-d h:i:s').' '.$request->commentary;
        }
        
        if ($request->user_id != 0 && $request->user_id != $id->user_id) {
            $request['status'] = 0;
            $user = User::find($request->user_id);
            $commentary = $commentary . $br.now()->format('Y-m-d h:i:s').' se suministra la herramienta a '.$user->name;
        }

        if ($request->user_id == 0) {
            $request['status'] = 1;
        }

        $request['commentary'] = $commentary;
        
        $id->update($request->all());

        return redirect()->route('inventory_tools')->with('success','Se ha actualizado la herramienta correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(invTool $id)
    {
        $id->delete();
        return redirect()->route('inventory_tools')->with('success','Se ha eliminado la herramienta correctamente');
    }
}
