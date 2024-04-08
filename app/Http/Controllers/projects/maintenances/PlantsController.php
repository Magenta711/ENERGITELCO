<?php

namespace App\Http\Controllers\projects\maintenances;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\project\msu\msu_campus;
use App\Models\project\msu\smu_plants;
use App\Models\project\msu\plant_general;
use App\Models\project\msu\plant_check;
use App\Models\project\msu\plant_resultado;
use App\Exports\msuPlantExport;
use Illuminate\Support\Facades\Storage;



class PlantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(msu_campus $id)
    {
        $general=plant_general::get();
        // return $general;
        return view('execution_works.maintenance.planta.index', compact('id', 'general'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(msu_campus $id)
    {
        return view('execution_works.maintenance.planta.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, msu_campus $id)
    {
        $request->validate([
            'name_base' => ['required'],
            'location' => ['required'],
        ]);
        $request['maintenance_id'] = $id->id;
        plant_general::where('maintenance_id',$id->id)->delete();
        $general = plant_general::create($request->all());
        $request['plant_id'] = $general->id;
        smu_plants::where('maintenance_id',$id->id)->delete();
        $plants= smu_plants::create($request->all());
        $resultados=plant_resultado::create($request->all());
        $slpe_str = json_encode($request->slpe);
        $scpe_str = json_encode($request->scpe);
        $sa_str = json_encode($request->sa);
        $srpe_str = json_encode($request->srpe);
        $seape_str = json_encode($request->seape);
        $semoceo_str = json_encode($request->semoceo);
        $gme_str = json_encode($request->gme);
        $mc_str = json_encode($request->mc);
        $ta_str = json_encode($request->ta);
        $prueba_realizada_str = json_encode($request->prueba_realizada);
        plant_check::where('maintenance_id',$id->id)->delete();
        $check=plant_check::create([
            'maintenance_id'=>$request->maintenance_id,
            'plant_id'=>$request->plant_id,
            'slpe'=>$slpe_str,
            'scpe'=>$scpe_str,
            'sa'=>$sa_str,
            'srpe'=>$srpe_str,
            'seape'=>$seape_str,
            'semoceo'=>$semoceo_str,
            'gme'=>$gme_str,
            'mc'=>$mc_str,
            'ta'=>$ta_str,
            'prueba_realizada'=>$prueba_realizada_str,
        ]);
        return redirect()->route('plant_index',$request->maintenance_id)->with('success','Se ha creado el mantenimiento correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(plant_general $id)
    {
        // return $id->id;
        $check_str=plant_check::where('plant_id',$id->id)->get()->first();
        $plant=smu_plants::where('plant_id',$id->id)->get()->first();
        $resultado=plant_resultado::where('plant_id', $id->id)->get()->first();

        $check['slpe']=json_decode($check_str->slpe, true);
        $check['scpe']=json_decode($check_str->scpe, true);
        $check['sa']=json_decode($check_str->sa, true);
        $check['srpe']=json_decode($check_str->srpe, true);
        $check['seape']=json_decode($check_str->seape, true);
        $check['semoceo']=json_decode($check_str->semoceo, true);
        $check['gme']=json_decode($check_str->gme, true);
        $check['mc']=json_decode($check_str->mc, true);
        $check['ta']=json_decode($check_str->ta, true);
        $check['prueba_realizada']=json_decode($check_str->prueba_realizada, true);

        // return count($check['slpe']);

        return view('execution_works.maintenance.planta.edit', compact('id', 'check', 'plant', 'resultado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,plant_general $id)
    {
        $id->update($request->all());
        $request['maintenance_id'] = $id->maintenance_id;
        $request['plant_id'] = $id->id;
        smu_plants::where('plant_id',$id->id)->delete();
        $plants= smu_plants::create($request->all());
        plant_resultado::where('plant_id',$id->id)->delete();
        $resultados=plant_resultado::create($request->all());
        $slpe_str = json_encode($request->slpe);
        $scpe_str = json_encode($request->scpe);
        $sa_str = json_encode($request->sa);
        $srpe_str = json_encode($request->srpe);
        $seape_str = json_encode($request->seape);
        $semoceo_str = json_encode($request->semoceo);
        $gme_str = json_encode($request->gme);
        $mc_str = json_encode($request->mc);
        $ta_str = json_encode($request->ta);
        $prueba_realizada_str = json_encode($request->prueba_realizada);
        plant_check::where('plant_id',$id->id)->delete();
        $check=plant_check::create([
            'maintenance_id'=>$request->maintenance_id,
            'plant_id'=>$request->plant_id,
            'slpe'=>$slpe_str,
            'scpe'=>$scpe_str,
            'sa'=>$sa_str,
            'srpe'=>$srpe_str,
            'seape'=>$seape_str,
            'semoceo'=>$semoceo_str,
            'gme'=>$gme_str,
            'mc'=>$mc_str,
            'ta'=>$ta_str,
            'prueba_realizada'=>$prueba_realizada_str,
        ]);

        return redirect()->route('plant_index',$request->maintenance_id)->with('success','Se ha actualizado el mantenimiento correctamente');
    }


    public function export(plant_general $id)
    {
        $check_str=plant_check::where('plant_id',$id->id)->get()->first();
        $plant=smu_plants::where('plant_id',$id->id)->get()->first();
        $resultado=plant_resultado::where('plant_id', $id->id)->get()->first();

        $check['slpe']=json_decode($check_str->slpe, true);
        $check['scpe']=json_decode($check_str->scpe, true);
        $check['sa']=json_decode($check_str->sa, true);
        $check['srpe']=json_decode($check_str->srpe, true);
        $check['seape']=json_decode($check_str->seape, true);
        $check['semoceo']=json_decode($check_str->semoceo, true);
        $check['gme']=json_decode($check_str->gme, true);
        $check['mc']=json_decode($check_str->mc, true);
        $check['ta']=json_decode($check_str->ta, true);
        $check['prueba_realizada']=json_decode($check_str->prueba_realizada, true);

        $files = array();
        // $files['logo_mintic']['name'] = 'Logo_mintic';
        // $files['logo_mintic']['description'] = 'Logo de MinTIC';
        // $files['logo_mintic']['path'] = public_path('/img/mintic.png');
        // $files['logo_mintic']['height'] = 90;
        // $files['logo_mintic']['coordinates'] = 'B3';
        // $files['logo_mintic']['place'] = 3;

        $files['logo_claro']['name'] = 'Logo_Claro';
        $files['logo_claro']['description'] = 'Logo de Claro';
        $files['logo_claro']['path'] = public_path('/img/claro.png');
        $files['logo_claro']['height'] = 80;
        $files['logo_claro']['coordinates'] = 'O3';
        $files['logo_claro']['place'] = 3;

        $string=$check['slpe'][5]["forma_detectarlo"];

        $str_len = strlen($string);

        // return ceil($str_len/41) * 11;

        // $count=count($check['slpe']);
        // return $resultado->cheque_aceite;
        // return view('execution_works.maintenance.planta.export', compact('id','check','plant', 'resultado'));
        return (new msuPlantExport($id,$check,$plant,$resultado ,$files))->download('Formato.xlsx');

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
