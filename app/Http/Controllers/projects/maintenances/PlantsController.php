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
use Image;
use Carbon\Carbon;

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
        $general=plant_general::where('maintenance_id',$id->id)->get();
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
        $request['creator_id'] = auth()->id();
        $request['update_id'] = auth()->id();
        $general = plant_general::create($request->all());
        $request['plant_id'] = $general->id;
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
        $request['update_id'] = auth()->id();
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

        $files['logo_claro']['name'] = 'Logo_Claro';
        $files['logo_claro']['description'] = 'Logo de Claro';
        $files['logo_claro']['path'] = public_path('/img/claro.png');
        $files['logo_claro']['height'] = 60;
        $files['logo_claro']['coordinates'] = 'L1';
        $files['logo_claro']['place'] = 3;

        $string=$check['slpe'][5]["forma_detectarlo"];

        $str_len = strlen($string);
        // return $files;
        return (new msuPlantExport($id,$check,$plant,$resultado ,$files))->download('PE ATS VERSION 2.xlsx');

    }

    function convertStringToArray($str) {
        // Check if the input is a single word (no spaces)
        if (strpos($str, ' ') !== false) {
          return null; // Handle multi-word input (return error or default)
        }

        // Split the string into an array of characters
        $charactersArray = str_split($str);

        // Return the array of characters
        return $charactersArray;
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

    public function upload(Request $request)
    {
        if ($request->hasFile('file')){
            $plant = plant_general::find($request->id);
            $file_exists = $plant->files->where('description',$request->name_d)->first();

            if ($file_exists){
                Storage::delete('public/upload/mintic/'.$file_exists->name);
            }
            $file = $request->file('file');

            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            if (!(isset($request->write) && $request->write == 'No' ) && ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg')) {

                $coordenadas = $this->coords($plant->campus->lat, $plant->campus->long);

                $lat=$coordenadas['latitud'];
                $long=$coordenadas['longitud'];

                $text2_sin = isset($request->date) && $request->date ? Carbon::create($request->date)->format('j F Y H:i:s') : now()->format('j F Y H:i:s');

                $text2 = $this->month($text2_sin);

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
                    $height = 50 + ($request->size_letter * 5);
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
                    $image->text($plant->campus->dep.'-'.$plant->campus->mun, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text($plant->campus->site_name, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text($plant->campus->dep, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text('#BTS'.$plant->campus->mun, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text('OT '.$plant->campus->OT, $image->width() - 5, $image->height() - $height, function($font) use($request) {
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
                    $image->text($plant->campus->population, $image->width() - 5, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5+$const);
                    $image->text($plant->campus->site_name, $image->width() - 5, $image->height() - $height, function($font) use($request,$const) {
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
            $plant->files()->create([
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

    public function photos($id, plant_general $item)
    {
        return view('execution_works.maintenance.planta.photos', compact('id','item'));
    }

    public function coords($lat, $long){

                $num_rand = rand(1,2);
                $string_lat = strval($lat);
                $string_long = strval($long);
                $string[1]=str_split($string_lat);
                $string[2]=str_split($string_long);
                $lenght[1]=count($string[1]);
                // return $string[1];
                for($i=1; $i<=2; $i++){
                    // return count($string[$i]);
                    $num_rand2 = rand(1,10);
                    $num_rand3 = rand(1,10);
                    for($j=0; $j < count($string[$i]); $j++){
                        if($string[$i][$j]==',' || $string[$i][$j]=='.'){
                            $dec[$i]=count($string[$i])-$j-1;
                        };
                    };
                    $first=count($string[$i])-1;
                    $second=count($string[$i])-2;
                    if($dec[$i]>=5){
                        // return $string[$i][$first];
                        if($num_rand==1){
                            if($string[$i][$first]+$num_rand2<10 && $string[$i][$second]+$num_rand3<10){
                                $string[$i][$first] = $string[$i][$first] + $num_rand2;
                                $string[$i][$second] = $string[$i][$second] + $num_rand3;
                            }else if($string[$i][$first]-$num_rand>0 && $string[$i][$second]-$num_rand3>0){
                                $string[$i][$first] = $string[$i][$first]- $num_rand2;
                                $string[$i][$second] = $string[$i][$second]- $num_rand3;
                                // return 'Hola';
                            }else{
                                $string[$i][$first] = $string[$i][$first];
                                $string[$i][$second] = $string[$i][$second];
                            }
                        }
                        else{
                            if($string[$i][$first]+$num_rand2<10){
                                $string[$i][$first] = $string[$i][$first] + $num_rand2;
                            }else if($string[$i][$first]-$num_rand>0 ){
                                $string[$i][$first] = $string[$i][$first]- $num_rand2;
                            }else{
                                $string[$i][$first] = $string[$i][$second];
                            }
                        }
                    }else if($dec[$i]<5 && $dec[$i]>=3){
                        if($num_rand){
                            if($string[$i][$first]+$num_rand2<10){
                                $string[$i][$first] = $string[$i][$first] + $num_rand2;
                            }else if($string[$i][$first]-$num_rand>0 ){
                                $string[$i][$first] = $string[$i][$first]- $num_rand2;
                            }else{
                                $string[$i][$first] = $string[$i][$first];
                            }
                        }
                    }
                    if( $string[$i][$first]==-1 ||  $string[$i][$first]==0){
                        $string[$i][$first]= $string[$i][$first]+2;
                    }
                    if( $string[$i][$second]==-1 ||  $string[$i][$second]==0){
                        $string[$i][$second]= $string[$i][$second]+2;
                    }
                    // return $string[$i];
                    $string[$i][$first] = strval($string[$i][$first]);
                    $string[$i][$second] = strval($string[$i][$second]);
                };
                $latitud=implode($string[1]);
                $longitud=implode($string[2]);

                $coodernadas = array(
                    "latitud" => $latitud,
                    "longitud"=> $longitud,
                );

        return $coodernadas;
    }

    public function month($date){

            $palabras = explode(" ", $date);

            switch ($palabras[1]) {
                case "January":
                $palabras[1] = "Enero";
                break;
                case "February":
                $palabras[1] = "Febrero";
                break;
                case "March":
                $palabras[1] = "Marzo";
                break;
                case "April":
                $palabras[1] = "Abril";
                break;
                case "May":
                $palabras[1] = "Mayo";
                break;
                case "June":
                $palabras[1] = "Junio";
                break;
                case "July":
                $palabras[1] = "Julio";
                break;
                case "August":
                $palabras[1] = "Agosto";
                break;
                case "September":
                $palabras[1] = "Septiembre";
                break;
                case "October":
                $palabras[1] = "Octubre";
                break;
                case "November":
                $palabras[1] = "Noviembre";
                break;
                case "December":
                $palabras[1] = "Diciembre";
                break;
                default:
                echo "Mes no encontrado: " . $palabras[1];
            }
        $frase_modificada = implode(" ", $palabras);

        return $frase_modificada;
    }
}
