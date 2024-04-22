<?php

namespace App\Http\Controllers\projects\maintenances;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;
use App\User;
use App\Models\project\msu\msu_campus;
use App\Models\project\msu\list_land;
use App\Models\project\msu\general_land;
use App\Exports\msuLandExport;

class LandController extends Controller
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
        $general=general_land::get();

        return view('execution_works.maintenance.tierra.index', compact('id','general'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(msu_campus $id)
    {
        $list = list_land::get();
        return view('execution_works.maintenance.tierra.create', compact('id','list'));
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
            'revisor' => ['required'],
            'tecnico' => ['required'],
        ]);

        $request['maintenance_id'] = $id->id;
        $request['creator_id'] = auth()->id();
        $request['update_id'] = auth()->id();

        $instrumento= json_encode($request->instrumento);
        $proteccion= json_encode($request->proteccion);
        $pararrayos= json_encode($request->pararrayos);
        $medicion= json_encode($request->medicion);
        $medicion_resistencia= json_encode($request->medicion_resistencia);
        $check= json_encode($request->check);

        $general = general_land::create([
            'maintenance_id'=>$request->maintenance_id,
            'creator_id'=>$request->creator_id,
            'update_id'=>$request->update_id,
            'revisor'=>$request->revisor,
            'tecnico'=>$request->tecnico,
            'instrumento'=>$instrumento,
            'proteccion'=>$proteccion,
            'pararrayos'=>$pararrayos,
            'medicion'=>$medicion,
            'medicion_resistencia'=>$medicion_resistencia,
            'observaciones'=>$request->observaciones,
            'check'=>$check,
            'plan_mejora'=>$request->plan_mejora,
        ]);

        return redirect()->route('land_index',$request->maintenance_id)->with('success','Se ha creado el mantenimiento correctamente');
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
    public function edit(general_land $id)
    {
        $dates['revisor']=$id->revisor;
        $dates['tecnico']=$id->tecnico;
        $dates['instrumento']=json_decode($id->instrumento, true);
        $dates['proteccion']=json_decode($id->proteccion, true);
        $dates['pararrayos']=json_decode($id->pararrayos, true);
        $dates['medicion']=json_decode($id->medicion, true);
        $dates['medicion_resistencia']=json_decode($id->medicion_resistencia, true);
        $dates['check']=json_decode($id->check, true);
        $dates['plan_mejora']=$id->plan_mejora;
        $dates['observaciones']=$id->observaciones;


        // return $dates['check'];
        return view('execution_works.maintenance.tierra.edit', compact('dates','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, general_land $id)
    {
        $request->validate([
            'revisor' => ['required'],
            'tecnico' => ['required'],
        ]);

        $instrumento= json_encode($request->instrumento);
        $proteccion= json_encode($request->proteccion);
        $pararrayos= json_encode($request->pararrayos);
        $medicion= json_encode($request->medicion);
        $medicion_resistencia= json_encode($request->medicion_resistencia);
        $check= json_encode($request->check);

        $request['update_id'] = auth()->id();
        $request['maintenance_id'] = $id->campus->id;


        $id->update([
            'update_id'=>$request->update_id,
            'revisor'=>$request->revisor,
            'tecnico'=>$request->tecnico,
            'instrumento'=>$instrumento,
            'proteccion'=>$proteccion,
            'pararrayos'=>$pararrayos,
            'medicion'=>$medicion,
            'medicion_resistencia'=>$medicion_resistencia,
            'observaciones'=>$request->observaciones,
            'check'=>$check,
            'plan_mejora'=>$request->plan_mejora,
        ]);


        return redirect()->route('land_index',$request->maintenance_id)->with('success','Se ha actualizado el mantenimiento correctamente');
    }

    public function export(general_land $id)
    {
        // return $id;
        $dates['revisor']=$id->revisor;
        $dates['tecnico']=$id->tecnico;
        $dates['instrumento']=json_decode($id->instrumento, true);
        $dates['proteccion']=json_decode($id->proteccion, true);
        $dates['pararrayos']=json_decode($id->pararrayos, true);
        $dates['medicion']=json_decode($id->medicion, true);
        $dates['medicion_resistencia']=json_decode($id->medicion_resistencia, true);
        $dates['check']=json_decode($id->check, true);
        $dates['plan_mejora']=$id->plan_mejora;
        $dates['observaciones']=$id->observaciones;

        $files['logo_claro']['name'] = 'Logo_Claro';
        $files['logo_claro']['description'] = 'Logo de Claro';
        $files['logo_claro']['path'] = public_path('/img/claro.png');
        $files['logo_claro']['height'] = 80;
        $files['logo_claro']['coordinates'] = 'O3';
        $files['logo_claro']['place'] = 3;

        // $files['logo_claro']['name'] = 'Logo_Claro';
        // $files['logo_claro']['description'] = 'Logo de Claro';
        // $files['logo_claro']['path'] = public_path('/img/claro.png');
        // $files['logo_claro']['height'] = 80;
        // $files['logo_claro']['coordinates'] = 'O3';
        // $files['logo_claro']['place'] = 3;

        if ($id->files)
        {
            foreach ($id->files as $key => $value) {
                if ($value->place && $value->place != 'XXX') {
                    $place = explode('.',$value->description,2);
                    $str = str_random();
                    $files[$str]['name'] = $value->name;
                    $files[$str]['description'] = $value->description;
                    $files[$str]['path'] = public_path('/storage/upload/mintic/'.$value->name);
                    $files[$str]['height'] = 200;
                    $files[$str]['coordinates'] = $value->place;
                    $files[$str]['place'] = $place[0];
                    // return $place;
                }
            }
        }
        // return $dates;
        // return view('execution_works.maintenance.tierra.export', compact('id','dates'));
        return (new msuLandExport($id, $dates,$files))->download('SPT-1A EM6 FORMATO PRUEBA.xlsx');
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

    public function photos($id, general_land $item)
    {
        return view('execution_works.maintenance.tierra.photos', compact('id','item'));
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')){
            $land = general_land::find($request->id);
            $file_exists = $land->files->where('description',$request->name_d)->first();

            if ($file_exists){
                Storage::delete('public/upload/mintic/'.$file_exists->name);
            }
            $file = $request->file('file');

            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            if (!(isset($request->write) && $request->write == 'No' ) && ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg')) {
                $num_rand = rand(1,2);
                $num_rand2 = rand(1,10);
                $num_rand3 = rand(1,10);
                $lat=$land->campus->lat;
                $long=$land->campus->long;
                $rand2 = (0.000001*$num_rand2);
                $rand3 = (0.000001*$num_rand3);

                $text2 = isset($request->date) && $request->date ? Carbon::create($request->date)->format('j F Y H:i:s') : now()->format('d/m/Y H:i:s');
                $palabras = explode(" ", $text2);

                $frase_modificada = implode(" ", $palabras);


                $text3 = $lat.'N '.$long . 'W';

                $image = Image::make($request->file);
                $image_sin = Image::make($request->file);
                if ($request->size != 'org') {
                    $image->resize(null, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_sin->resize(null, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $height = 25 + ($request->size_letter * 3);
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
                    $height = $height - $request->size_letter - 2;
                    $image->text($land->campus->dep, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text($land->campus->site_name, $image->width() - 5, $image->height() - $height, function($font) use($request) {
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
                    $image->text($land->campus->dep, $image->width() - 5, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5+$const);
                    $image->text($land->campus->site_name, $image->width() - 5, $image->height() - $height, function($font) use($request,$const) {
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
            $land->files()->create([
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
