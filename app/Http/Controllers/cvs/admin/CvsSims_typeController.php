<?php

namespace App\Http\Controllers\cvs\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cvs\admin\cvs_inv_sim_prices;
use App\Models\cvs\admin\cvs_sede;
use App\Models\cvs\inventory\cvs_inv_sim;
use App\Models\cvs\inventory\cvs_inv_sim_type;

class CvsSims_typeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:CVS Lista de tipos de sim cards|CVS Ver tipos de sim cards|Crear tipos de sim cards|CVS Editar tipos de sim cards',['only' => ['index']]);
        $this->middleware('permission:CVS Crear tipos de sim cards',['only' => ['create','store']]);
        $this->middleware('permission:CVS Editar tipos de sim cards',['only' => ['edit','update']]);
        $this->middleware('permission:CVS Ver tipos de sim cards',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sim_types = cvs_inv_sim_type::get();
        
        return view('cvs.admin.sim_types.index',compact('sim_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sedes = cvs_sede::get();
        return view('cvs.admin.sim_types.create',compact('sedes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = cvs_inv_sim_type::create(['name' => $request->name]);
        for ($i=0; $i < count($request->prices); $i++) {
            cvs_inv_sim_prices::create([
                'sede_id' => ($i + 1),
                'sim_type_id' => $id->id,
                'prices'=> $request->prices[$i + 1],
            ]);
        }
        return redirect()->route('cvs_admin_sims_type')->with('success','Se ha creado el tipo de sim correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(cvs_inv_sim_type $id)
    {
        return view('cvs.admin.sim_types.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(cvs_inv_sim_type $id)
    {
        $sedes = cvs_sede::get();
        return view('cvs.admin.sim_types.edit',compact('id','sedes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,cvs_inv_sim_type $id)
    {
        $id->update(['name' => $request->name]);
        cvs_inv_sim_prices::where('sim_type_id',$id->id)->delete();
        for ($i=0; $i < count($request->prices); $i++) {
            cvs_inv_sim_prices::create([
                'sede_id' => ($i + 1),
                'sim_type_id' => $id->id,
                'prices'=> $request->prices[$i + 1],
            ]);
        }
        return redirect()->route('cvs_admin_sims_type')->with('success','Se ha actualizado el tipo de sim correctamente');
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
