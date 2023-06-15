<?php

namespace App\Http\Controllers\projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\project\Mintic\Mintic_School;
use App\Models\project\Mintic\inventory\EquimentDetail;
use App\Models\project\Mintic\mintic_maintenance;
use Illuminate\Support\Facades\Storage;
use App\Notifications\notificationMain;
use Image;
use App\User;
use App\Exports\minticMaintenanceDevolution;
use App\Exports\minticMaintenanceExport;
use App\Models\project\Mintic\miniticMaintenanceActivityDetail;
use App\Models\project\Mintic\miniticMaintenanceEquipment;
use App\Models\project\Mintic\MinticMaintenanceActivity;
use App\Models\project\Mintic\MinticVisit;
use App\Models\system_setting;
use App\Models\InvUser;
use Carbon\Carbon;
use App\Models\project\Mintic\inventory\invMinticEquipment;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Mintic_School $id)
    {
        return view('projects.mintic.maintenance.index',compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Mintic_School $id)
    {
        $activities = MinticMaintenanceActivity::get();
        $users = User::where('state',1)->get();
        return view('projects.mintic.maintenance.create',compact('id','activities','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'receives_id' => ['required'],
            // 'name' => ['required'],
        ]);
        $request['project_id'] = $id;
        $request['status'] = 1;
        $main = mintic_maintenance::create($request->all());

        if (isset($request->activity_status)) {
            foreach ($request->activity_status as $key => $value) {
                miniticMaintenanceActivityDetail::create([
                    'activity_id' => $key,
                    'maintenance_id' => $main->id,
                    'status' => $value,
                ]);
            }
        }

        return redirect()->route('mintic_maintenance',$id)->with('success','Se ha creado el mantenimiento correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,mintic_maintenance $item)
    {
        $equipments = EquimentDetail::get();
        $activities = MinticMaintenanceActivity::get();
        return view('projects.mintic.maintenance.show',compact('id','item','equipments','activities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,mintic_maintenance $item)
    {
        $equipments = EquimentDetail::get();
        $user_equipments = InvUser::where('user_id', $item->receives_id)->where('inventaryble_type', 'App\\Models\\project\\Mintic\\inventory\\invMinticEquipment')->get();
        // return $user_equipments;
        // foreach ($user_equipments as $equipment) {
        //     return $equipment->inventaryble;
        // }
        $activities = MinticMaintenanceActivity::get();
        $users = User::where('state',1)->get();
        // return $item->id;
        return view('projects.mintic.maintenance.edit',compact('id','item','equipments','user_equipments','activities','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id,mintic_maintenance $item)
    {
        $item->update($request->all());
        miniticMaintenanceEquipment::where('maintenance_id',$item->id)->delete();
        if (isset($request->detail_retired)) {
            foreach ($request->detail_retired as $key => $value) {
                miniticMaintenanceEquipment::create([
                    'serial' => $request->serial_retired[$key],
                    'detail_id' => $request->detail_retired[$key],
                    'maintenance_id' => $item->id,
                    'type' => 'retired'
                ]);

                $retired = invMinticEquipment::where('serial', $request->serial_retired[$key])->first();
                // return $request;
                if ($retired){
                    $retired->update([
                        'status' => 6
                    ]);
                }
                if(!$retired) {
                    $equiment_detail = EquimentDetail::find($request->detail_retired[$key]);
                    $retired = invMinticEquipment::create([
                        'serial' => $request->serial_retired[$key],
                        'item' => $equiment_detail->name,
                        'brand' => $equiment_detail->brand,
                        'status' => 6,
                        'commentary' => '',
                        'equip_id' => $request->detail_retired[$key],
                        'type' => 'Mantenimiento',
                    ]);
                }

                // return $retired;
                $inv = InvUser::where('user_id',$request->receives_id)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id',$retired->id)->first();
                if ($inv) {
                    $inv->entrar(1);
                }else {
                    InvUser::create([
                        'user_id' => $request->receives_id,
                        'inventaryble_id' => $retired->id,
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                        'tickets' => 1,
                        'departures' => 0,
                        'stock' => 1
                    ]);
                }
            }
        }
        if (isset($request->detail_install)) {
            foreach ($request->detail_install as $key => $value) {
                miniticMaintenanceEquipment::create([
                    'serial' => $request->serial_install[$key],
                    'detail_id' => $request->detail_install[$key],
                    'maintenance_id' => $item->id,
                    'type' => 'install'
                ]);
            }
            if($request->detail_install){
                invMinticEquipment::where('serial',$request->serial_install[$key])->update([
                    'status' => 3
                ]);
            }
        }
        // return $id;
        miniticMaintenanceActivityDetail::where('maintenance_id',$item->id)->delete();
        if (isset($request->activity_status)) {
            foreach ($request->activity_status as $key => $value) {
                miniticMaintenanceActivityDetail::create([
                    'activity_id' => $key,
                    'maintenance_id' => $item->id,
                    'status' => $value,
                ]);
            }
        }
        // return $item;
        return redirect()->route('mintic_maintenance',$id)->with('success','Se ha actualizado el mantenimiento correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,mintic_maintenance $item)
    {
        $item->delete();
        return redirect()->route('mintic_maintenance',$id)->with(['success'=>'Se ha eliminado el mantenimiento correctamente']);
    }

    public function photos($id,mintic_maintenance $item)
    {
        return view('projects.mintic.maintenance.photos',compact('id','item'));
    }

    public function export($id,mintic_maintenance $item)
    {
        $system = system_setting::where('state',1)->orderBy('id','DESC')->take(1)->first();

        $equipments = EquimentDetail::get();
        $activities = MinticMaintenanceActivity::get();

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
        $files['logo_claro']['coordinates'] = 'N3';
        $files['logo_claro']['place'] = 3;

        if ($item->files)
        {
            foreach ($item->files as $key => $value) {
                if ($value->place && $value->place != 'XXX') {
                    $place = explode('.',$value->description,2);
                    $str = str_random();
                    $files[$str]['name'] = $value->name;
                    $files[$str]['description'] = $value->description;
                    $files[$str]['path'] = public_path('/storage/upload/mintic/'.$value->name);
                    $files[$str]['height'] = 200;
                    $files[$str]['coordinates'] = $value->place;
                    $files[$str]['place'] = $place[0];
                }
            }
        }

        if ($item->receives && $item->receives->signature) {
            $j = 1;
            $accEquip = 1;
            foreach ($equipments as $equipment_item) {
                if ( $equipment_item->is_informe ){
                    $accEquip++;
                }
            }
            foreach ($equipments as $equipment_item) {
                if ($equipment_item->type == 'retired'){
                    $j++;
                }
            }

            if ($j = 1) {
                $j = 8;
            }

            $files['signature']['name'] = 'Signature';
            $files['signature']['description'] = 'Firma de funcionario';
            $files['signature']['path'] = public_path('/storage/signature/'.$item->receives->signature);
            $files['signature']['height'] = 60;
            $files['signature']['coordinates'] = 'F'. (($accEquip + 20) + 1 + $j + 8);
            $files['signature']['place'] = 4;
        }
        return (new minticMaintenanceExport($item,$equipments,$files,$activities))->download('Formato Mantenimiento Correctivo.xlsx');
    }

    public function devolution($id,mintic_maintenance $item)
    {
        $system = system_setting::where('state',1)->orderBy('id','DESC')->take(1)->first();

        $equipments = EquimentDetail::get();
        $activities = MinticMaintenanceActivity::get();

        $files = array();


        $files['logo_claro']['name'] = 'Logo_Claro';
        $files['logo_claro']['description'] = 'Logo de Claro';
        $files['logo_claro']['path'] = public_path('/img/claro.png');
        $files['logo_claro']['height'] = 80;
        $files['logo_claro']['coordinates'] = 'c3';
        $files['logo_claro']['place'] = 3;

        if ($item->receives && $item->receives->signature) {
            $j = 1;
            $accEquip = 1;
            foreach ($equipments as $equipment_item) {
                if ( $equipment_item->is_informe ){
                    $accEquip++;
                }
            }
            foreach ($equipments as $equipment_item) {
                if ($equipment_item->type == 'retired'){
                    $j++;
                }
            }

            if ($j = 1) {
                $j = 8;
            }

            $files['signature']['name'] = 'Signature';
            $files['signature']['description'] = 'Firma de funcionario';
            $files['signature']['path'] = public_path('/storage/signature/'.$item->receives->signature);
            $files['signature']['height'] = 60;
            $files['signature']['coordinates'] = 'F'. (($accEquip + 20) + 1 + $j + 8);
            $files['signature']['place'] = 4;
        }

        return (new minticMaintenanceDevolution($item,$equipments,$files,$activities))->download('Acta cambios equipos.xlsx');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')){
            $mintic = mintic_maintenance::find($request->id);
            $visit = MinticVisit::where('project_id',$request->id)->where('type','maintenance')->first();
            $file_exists = $mintic->files->where('description',$request->name_d)->first();

            if ($file_exists){
                Storage::delete('public/upload/mintic/'.$file_exists->name);
            }
            $file = $request->file('file');

            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            if (!(isset($request->write) && $request->write == 'No' ) && ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg')) {
                $text2 = $mintic->project->long.' / '.$mintic->project->lat;
                $text3 = isset($request->date) && $request->date ? Carbon::create($request->date)->format('Y-m-d H:i:s') : now()->format('Y-m-d H:i:s');

                $image = Image::make($request->file);
                if ($request->size != 'org') {
                        $image->resize(null, 500, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    $height = 25 + ($request->size_letter * 3);
                    $image->text('ID '.$mintic->code, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text($mintic->name, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text($text2, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text($text3, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $size = '650';
                }else {
                    $size = $file->getClientSize() / 1000;
                    $const = 0.3 * $size;
                    $height = $const;
                    $image->text($text3, $image->width() - 5, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5+$const);
                    $image->text($text2, $image->width() - 5, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5+$const);
                    $image->text($mintic->name, $image->width() - 5, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5+$const);
                    $image->text('ID '.$mintic->code, $image->width() - 5, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                }
                $image->save(public_path('storage/upload/mintic/'.$name));
            }else {
                $size = $file->getClientSize() / 1000;
                $path = Storage::putFileAs('public/upload/mintic', $file, $name);
            }
            if ($file_exists) {
                $file_exists->update([
                    'name' => $name,
                    'description' => $request->name_d,
                    'commentary' => $request->commentary,
                    'size' => $size.' KB',
                    'url' => 'public/upload/mintic/'.$name,
                    'type' => $file->getClientOriginalExtension(),
                    'place' => $request->place,
                    'state' => 1
                ]);
                return response()->json([
                    'success'=>'Se subio y actualizo correctamente el archivo',
                    'size' => $size.' KB',
                    'name' => $name,
                    'type' => $file->getClientOriginalExtension(),
                ]);
            }
            $mintic->files()->create([
                'name' => $name,
                'description' => $request->name_d,
                'commentary' => $request->commentary,
                'size' => $size.' KB',
                'url' => 'public/upload/mintic/'.$name,
                'type' => $file->getClientOriginalExtension(),
                'place' => $request->place,
                'state' => 1
            ]);
            return response()->json([
                'success'=>'Se subio correctamente el archivo',
                'size' => $size.' KB',
                'name' => $name,
                'type' => $file->getClientOriginalExtension(),
            ]);
        }else {
            return response()->json(['success'=>'No se examino un archivo']);
        }
    }
}
