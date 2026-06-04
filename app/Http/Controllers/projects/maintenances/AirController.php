<?php

namespace App\Http\Controllers\projects\maintenances;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\project\msu\msu_campus;
use App\Models\project\msu\List_Air;
use App\Models\project\msu\General_Air;
use App\Exports\msuAirExport;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Image;


class AirController extends Controller
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
        $general=General_Air::where('maintenance_id',$id->id)->get();
        // return $general;
        // return $general->editor->name;
        return view('execution_works.maintenance.aire.index', compact('id','general'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(msu_campus $id)
    {
        $list=List_Air::get();
        // return $list;
        return view('execution_works.maintenance.aire.create', compact('id','list'));
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

        $aa = json_encode($request->aa);
        $temp = json_encode($request->temp);
        $compresor = json_encode($request->compresor);
        $unidad = json_encode($request->unidad);
        $manejadora = json_encode($request->manejadora);
        $actions = json_encode($request->actions);
        $check = json_encode($request->check);
        // return $actions;
        $general = General_Air::create([
            'maintenance_id'=>$request->maintenance_id,
            'revisor'=>$request->revisor,
            'tecnico'=>$request->tecnico,
            'dates_a_a'=>$aa,
            'temp'=>$temp,
            'compresor'=>$compresor,
            'unidad'=>$unidad,
            'manejadora'=>$manejadora,
            'check'=>$check,
            'actions'=>$actions,
            'plan_mejora'=>$request->plan_mejora,
            'creator_id'=>$request->creator_id,
            'update_id'=>$request->update_id,
        ]);

        return redirect()->route('air_index',$request->maintenance_id)->with('success','Se ha creado el mantenimiento correctamente');
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
    public function edit(General_Air $id)
    {
        // return $id->check;
        $list=List_Air::get();
        $dates['revisor']=$id->revisor;
        $dates['tecnico']=$id->tecnico;
        $dates['dates_a_a']=json_decode($id->dates_a_a, true);
        $dates['temp']=json_decode($id->temp, true);
        $dates['compresor']=json_decode($id->compresor, true);
        $dates['unidad']=json_decode($id->unidad, true);
        $dates['actions']=json_decode($id->actions, true);
        $dates['manejadora']=json_decode($id->manejadora, true);
        $dates['plan_mejora']=$id->plan_mejora;
        $dates['check']=json_decode($id->check, true);

        // return $dates['check'];

        return view('execution_works.maintenance.aire.edit', compact('id','dates','list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, General_Air $id)
    {
        $request->validate([
            'revisor' => ['required'],
            'tecnico' => ['required'],
        ]);

        $request['maintenance_id'] = $id->campus->id;
        $request['update_id'] = auth()->id();

        $dates_a_a = json_encode($request->aa);
        $temp = json_encode($request->temp);
        $compresor = json_encode($request->compresor);
        $unidad = json_encode($request->unidad);
        $manejadora = json_encode($request->manejadora);
        $actions = json_encode($request->actions);
        $check = json_encode($request->check);
        if($id){
            $id->update([
                'maintenance_id'=>$request->maintenance_id,
                'revisor'=>$request->revisor,
                'tecnico'=>$request->tecnico,
                'dates_a_a'=>$dates_a_a,
                'temp'=>$temp,
                'compresor'=>$compresor,
                'unidad'=>$unidad,
                'manejadora'=>$manejadora,
                'check'=>$check,
                'actions'=>$actions,
                'plan_mejora'=>$request->plan_mejora,
                'update_id'=>$request->update_id
            ]);
        }
        return redirect()->route('air_index',$request->maintenance_id)->with('success','Se ha actualizado el mantenimiento correctamente');
    }

    public function export(General_Air $id)
    {
        $dates['revisor']=$id->revisor;
        $dates['tecnico']=$id->tecnico;
        $dates['dates_a_a']=json_decode($id->dates_a_a, true);
        $dates['temp']=json_decode($id->temp, true);
        $dates['compresor']=json_decode($id->compresor, true);
        $dates['unidad']=json_decode($id->unidad, true);
        $dates['actions']=json_decode($id->actions, true);
        $dates['manejadora']=json_decode($id->manejadora, true);
        $dates['plan_mejora']=$id->plan_mejora;
        $dates['check']=json_decode($id->check, true);
        $dates['campus']=$id->campus->site_name;

        $files['logo_claro']['name'] = 'Logo_Claro';
        $files['logo_claro']['description'] = 'Logo de Claro';
        $files['logo_claro']['path'] = public_path('/img/claro.png');
        $files['logo_claro']['height'] = 80;
        $files['logo_claro']['coordinates'] = 'N2';
        $files['logo_claro']['place'] = 3;

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

        return (new msuAirExport($dates,$files))->download('AA-1A EM2.xlsx');
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

    public function photos($id, General_Air $item)
    {
        return view('execution_works.maintenance.aire.photos', compact('id', 'item'));
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')){
            $air = General_Air::find($request->id);
            $file_exists = $air->files->where('description',$request->name_d)->first();

            if ($file_exists){
                Storage::delete('public/upload/mintic/'.$file_exists->name);
            }
            $file = $request->file('file');

            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            if (!(isset($request->write) && $request->write == 'No' ) && ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg')) {
                $coordenadas = $this->coords($air->campus->lat, $air->campus->long);

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
                    $image->text($air->campus->dep.'-'.$air->campus->mun, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text($air->campus->site_name, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text($air->campus->dep, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text('#BTS'.$air->campus->mun, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text('OT '.$air->campus->OT, $image->width() - 5, $image->height() - $height, function($font) use($request) {
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
                    $image->text($air->campus->population, $image->width() - 5, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5+$const);
                    $image->text($air->campus->site_name, $image->width() - 5, $image->height() - $height, function($font) use($request,$const) {
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
            $air->files()->create([
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
