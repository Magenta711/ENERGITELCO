<?php

namespace App\Http\Controllers\cvs\inventary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cvs\inventory\cvs_inv_sim;
use App\Models\cvs\inventory\cvs_inv_sim_type;
use App\User;

class CvsInventarySimController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:CVS Lista de sim cards|CVS Ver sim cards|CVS Crear sim cards|CVS Editar sim cards',['only' => ['index']]);
        $this->middleware('permission:CVS Crear sim cards',['only' => ['create','store']]);
        $this->middleware('permission:CVS Editar sim cards',['only' => ['edit','update']]);
        $this->middleware('permission:CVS Ver sim cards',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sims = cvs_inv_sim::get();
        return view('cvs.inventory.sims.index',compact('sims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = cvs_inv_sim_type::get();
        $users = User::where('state',1)->get();
        return view('cvs.inventory.sims.create',compact('types','users'));
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
            'serial' => ['required'],
            'type_id' => ['required'],
            'date' => ['required'],
        ]);
        for ($i=0; $i < count($request->serial); $i++) {
            cvs_inv_sim::create([
                'cod' => $request->serial[$i],
                'description' => 'Sim Card',
                'type_id' => $request->type_id[$i],
                'user_id' => $request->user_id[$i],
                'date' => $request->date[$i],
                'status' => 1,
            ]);
        }
        return redirect()->route('cvs_inventary_sims')->with('success','Se ha creado la sim card(s) correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(cvs_inv_sim $id)
    {
        return view('cvs.inventory.sims.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(cvs_inv_sim $id)
    {
        $users = User::where('state',1)->get();
        $types = cvs_inv_sim_type::get();
        return view('cvs.inventory.sims.edit',compact('id','users','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,cvs_inv_sim $id)
    {
        $request->validate([
            'serial' => ['required'],
            'type_id' => ['required'],
            'date' => ['required'],
        ]);

        $id->update([
            'cod' => $request->serial,
            'description' => 'Sim Card',
            'type_id' => $request->type_id,
            'user_id' => $request->user_id,
            'date' => $request->date,
        ]);

        return redirect()->route('cvs_inventary_sims')->with('success','Se ha actualizado la sim card correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(cvs_inv_sim $id)
    {
        $id->delete();
        return redirect()->route('cvs_inventary_sims')->with('success','Se ha eliminado la sim card '.$id->cod.' correctamente');
    }
}
