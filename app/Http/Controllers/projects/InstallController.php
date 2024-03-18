<?php

namespace App\Http\Controllers\projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\project\Mintic\Mintic_School;
use App\Models\project\Mintic\inventory\EquimentDetail;
use App\Models\project\Mintic\inventory\EquipmentSimple;
use App\Models\project\Mintic\mintic_maintenance;
use App\Models\project\Mintic\mintic_installation;
use App\Models\project\Mintic\mintic_installation_equipment;
use App\Models\project\Mintic\mintic_installation_activity_equipment;
use Illuminate\Support\Facades\Storage;
use App\Notifications\notificationMain;
use Image;
use App\User;
use App\Exports\minticInstallationExport;
use App\Models\project\Mintic\miniticMaintenanceActivityDetail;
use App\Models\project\Mintic\miniticMaintenanceEquipment;
use App\Models\project\Mintic\MinticMaintenanceActivity;
use App\Models\project\Mintic\MinticVisit;
use App\Models\system_setting;
use Carbon\Carbon;

class InstallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Mintic_School $id)
    {
        $install=mintic_installation::get();
        return view('projects.mintic.install.index',compact('id','install'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Mintic_School $id)
    {
        $equipments = mintic_installation_equipment::get();
        $equipment_simples = EquipmentSimple::get();
        $activities = MinticMaintenanceActivity::get();
        $users = User::where('state',1)->get();

        // return $id;
        return view('projects.mintic.install.create',compact('id','equipments','activities','users','equipment_simples'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'date' => ['required'],
            'repair_id' => ['required'],
        ]);

        $request['project_id'] = $id;
        $request['status'] = 1;
        // return $request;
        $main = mintic_installation::create($request->all());

        foreach ($request->description as $key => $value) {
                mintic_installation_activity_equipment::create([
                    'project_id' => $id,
                    'installation_id' => $main->id,
                    'description' => $request->description[$key],
                    'brand' => $request->description[$key],
                    'model' => $request->model[$key],
                    'amount' => $request->amount[$key],
                ]);
            }

        return redirect()->route('install',$id)->with('success','Se ha creado la instalación correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mintic_School $id, mintic_installation $item)
    {
        // return $item;
        return view('projects.mintic.install.show', compact('id','item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mintic_School $id, mintic_installation $item)
    {

        return view('projects.mintic.install.edit', compact('id','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id, mintic_installation $item)
    {
        $item->update($request->all());
        mintic_installation_activity_equipment::where('installation_id',$item->id)->delete();

        foreach ($request->description as $key => $value) {
            mintic_installation_activity_equipment::create([
                'project_id' => $id,
                'installation_id' => $item->id,
                'description' => $request->description[$key],
                'brand' => $request->description[$key],
                'model' => $request->model[$key],
                'amount' => $request->amount[$key],
            ]);
        }

        return redirect()->route('install',$id)->with('success','Se ha actualizado la instalación correctamente');

    }

    public function export($id, mintic_installation $item)
    {
        $system = system_setting::where('state',1)->orderBy('id','DESC')->take(1)->first();

        $equipments = mintic_installation_equipment::get();
        $activities = mintic_installation_activity_equipment::get();

        $files = array();
        $files['logo_mintic']['name'] = 'Logo_mintic';
        $files['logo_mintic']['description'] = 'Logo de MinTIC';
        $files['logo_mintic']['path'] = public_path('/img/mintic.png');
        $files['logo_mintic']['height'] = 90;
        $files['logo_mintic']['coordinates'] = 'B3';
        $files['logo_mintic']['place'] = 3;

        $files['logo_claro']['name'] = 'Logo_Claro';
        $files['logo_claro']['description'] = 'Logo de Claro';
        $files['logo_claro']['path'] = public_path('/img/claro.png');
        $files['logo_claro']['height'] = 80;
        $files['logo_claro']['coordinates'] = 'O3';
        $files['logo_claro']['place'] = 3;

        // if ($item->receives && $item->receives->signature) {
        //     $j = 1;
        //     $accEquip = 1;
        //     foreach ($equipments as $equipment_item) {
        //         if ( $equipment_item->is_informe ){
        //             $accEquip++;
        //         }
        //     }
        //     foreach ($equipments as $equipment_item) {
        //         if ($equipment_item->type == 'retired'){
        //             $j++;
        //         }
        //     }

        //     if ($j = 1) {
        //         $j = 8;
        //     }

        //     $files['signature']['name'] = 'Signature';
        //     $files['signature']['description'] = 'Firma de funcionario';
        //     $files['signature']['path'] = public_path('/storage/signature/'.$item->receives->signature);
        //     $files['signature']['height'] = 60;
        //     $files['signature']['coordinates'] = 'F'. (($accEquip + 20) + 1 + $j + 8);
        //     $files['signature']['place'] = 4;
        // }

        return view('projects.mintic.install.export.first',compact('item','equipments','activities','files'));

        return (new minticInstallationExport($item,$equipments,$activities,$files))->download('Formato De Instalación.xlsx');
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
