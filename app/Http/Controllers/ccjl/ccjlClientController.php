<?php

namespace App\Http\Controllers\ccjl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ccjl\ccjl_clients;

class ccjlClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('verified');
        
        $this->middleware('permission:CCJL Lista de clientes|CCJL Editar clientes|CCJL Ver clientes',['only' => ['index']]);
        $this->middleware('permission:CCJL Editar clientes',['only' => ['edit','update']]);
        $this->middleware('permission:CCJL Ver clientes',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = ccjl_clients::get();
        return view('ccjl.clients.index',compact('clients'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ccjl_clients $id)
    {
        return view('ccjl.clients.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ccjl_clients $id)
    {
        return view('ccjl.clients.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ccjl_clients $id)
    {
        $request->validate([
            'name' => ['required'],
            'document_type' => ['required'],
            'document_type' => ['required'],
            'document' => ['required'],
            'email' => ['required'],
            'number' => ['required'],
        ]);
        
        $id->update($request->all());

        return redirect()->route('CCJL_clients')->with('success','Se ha actualizado el cliente correctamente');
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
