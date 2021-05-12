<?php

namespace App\Http\Controllers\ccjl\products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ccjl\ccjl_pro_local;

class ccjlLocalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('verified');

        $this->middleware('permission:CCJL Lista de canons|CCJL Editar canons|CCJL Ver canons',['only' => ['index']]);
        $this->middleware('permission:CCJL Editar canons',['only' => ['edit','update']]);
        $this->middleware('permission:CCJL Ver canons',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locals = ccjl_pro_local::get();
        return view('ccjl.products.local.index',compact('locals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ccjl.products.local.create');
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
            'floor' => ['required'],
            'departament' => ['required'],
            'value' => ['required']
        ]);
        $request['status'] = 1;
        ccjl_pro_local::create($request->all());
        return redirect()->route('CCJL_locals')->with('success','Se ha creado el canon correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ccjl_pro_local $id)
    {
        return view('ccjl.products.local.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ccjl_pro_local $id)
    {
        return view('ccjl.products.local.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ccjl_pro_local $id)
    {
        $id->update($request->all());
        return redirect()->route('CCJL_locals')->with('success','Se ha editado el canon correctamente');
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
