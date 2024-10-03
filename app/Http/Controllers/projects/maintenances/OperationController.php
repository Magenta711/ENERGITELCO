<?php

namespace App\Http\Controllers\projects\maintenances;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;
use App\User;
use App\Models\project\msu\msu_campus;
use App\Models\project\msu\GeneralOperation;
use App\Exports\msuOperationExport;
use Carbon\Carbon;

class OperationController extends Controller
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
        $general=GeneralOperation::where('maintenance_id',$id->id)->get();
        return view('execution_works.maintenance.operacion.index', compact('id','general'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(msu_campus $id)
    {
        // return $id;

        return view('execution_works.maintenance.operacion.create', compact('id'));

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
            'empresa' => ['required'],
            'fechaElaboracion' => ['required'],
        ]);

        $request['maintenance_id'] = $id->id;
        $request['creator_id'] = auth()->id();
        $request['update_id'] = auth()->id();

        $fotos= json_encode($request->fotos);
        $general= json_encode($request->general);
        $activity= json_encode($request->activity);
        $findings= json_encode($request->findings);
        $transport= json_encode($request->transport);

        $general = GeneralOperation::create([
            'maintenance_id'=>$request->maintenance_id,
            'creator_id'=>$request->creator_id,
            'update_id'=>$request->update_id,
            'revisor'=>$request->revisor,
            'tecnico'=>$request->tecnico,
            'empresa'=>$request->empresa,
            'fechaElaboracion'=>$request->fechaElaboracion,
            'fotos'=>$fotos,
            'general'=>$general,
            'activity'=>$activity,
            'findings'=>$findings,
            'transport'=>$transport,
        ]);

        return redirect()->route('operation_index',$request->maintenance_id)->with('success','Se ha creado el mantenimiento correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function photos($id, GeneralOperation $item)
    {
        // return $item->files;
        return view('execution_works.maintenance.operacion.photos', compact('id', 'item'));
    }

    public function cantidad_photos(Request $request, $id, GeneralOperation $item)
    {
        if(count($item->files)>$request->numPhoto || !($request->numPhoto%2 == 0)){
            $error='No se aceptan valores Impares y/o ingresar menos campos de los que ya tienen fotos';
            return redirect()->back()->withErrors([$error])->withInput();
        }

        $item->update([
            'cantidad_fotos'=>$request->numPhoto,
        ]);
        return redirect()->route('operation_photos',[$id, $item])->with('success','Se ha creado los campos satisfactoriamente');

        // return view('execution_works.maintenance.operacion.photos', compact('id', 'item'));
    }

    public function descripcion_photos(Request $request, $id, GeneralOperation $item)
    {
        $descriptions = $request->input('description');
        return ($descriptions);
        // if(count($item->files)>$request->numPhoto || !($request->numPhoto%2 == 0)){
        //     $error='No se aceptan valores Impares y/o ingresar menos campos de los que ya tienen fotos';
        //     return redirect()->back()->withErrors([$error])->withInput();
        // }

        // $item->update([
        //     'cantidad_fotos'=>$request->numPhoto,
        // ]);
        // return redirect()->route('operation_photos',[$id, $item])->with('success','Se ha creado los campos satisfactoriamente');

        // return view('execution_works.maintenance.operacion.photos', compact('id', 'item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralOperation $id)
    {
        // return $id;
        $general['fotos']=json_decode($id->fotos, true);
        $general['general']=json_decode($id->general, true);
        $general['activity']=json_decode($id->activity, true);
        $general['findings']=json_decode($id->findings, true);
        $general['transport']=json_decode($id->transport, true);
        // return $general['general'];
        return view('execution_works.maintenance.operacion.edit', compact('id','general'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralOperation $id)
    {
        $request->validate([
            'revisor' => ['required'],
            'tecnico' => ['required'],
            'empresa' => ['required'],
            'fechaElaboracion' => ['required'],
        ]);

        $fotos= json_encode($request->fotos);
        $general= json_encode($request->general);
        $activity= json_encode($request->activity);
        $findings= json_encode($request->findings);
        $transport= json_encode($request->transport);

        $request['update_id'] = auth()->id();
        $request['maintenance_id'] = $id->campus->id;

        $id->update([
            'update_id'=>$request->update_id,
            'revisor'=>$request->revisor,
            'tecnico'=>$request->tecnico,
            'empresa'=>$request->empresa,
            'fechaElaboracion'=>$request->fechaElaboracion,
            'fotos'=>$fotos,
            'general'=>$general,
            'activity'=>$activity,
            'findings'=>$findings,
            'transport'=>$transport,
        ]);

        return redirect()->route('operation_index',$request->maintenance_id)->with('success','Se ha actualizado el mantenimiento correctamente');
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

    public function export(GeneralOperation $id)
    {


        $dates['fotos']=json_decode($id->fotos, true);
        $dates['general']=json_decode($id->general, true);
        $dates['activity']=json_decode($id->activity, true);
        $dates['findings']=json_decode($id->findings, true);
        $dates['transport']=json_decode($id->transport, true);


        $files['logo_claro']['name'] = 'Logo_Claro';
        $files['logo_claro']['description'] = 'Logo de Claro';
        $files['logo_claro']['path'] = public_path('/img/claro.png');
        $files['logo_claro']['height'] = 90;
        $files['logo_claro']['coordinates'] = 'K1';
        $files['logo_claro']['place'] = 3;

        if($id->empresa=='CINCO'){
            $files['logo_cinco']['name'] = 'Logo_cinco';
            $files['logo_cinco']['description'] = 'Logo de Cinco';
            $files['logo_cinco']['path'] = public_path('/img/cinco.jpg');
            $files['logo_cinco']['height'] = 90;
            $files['logo_cinco']['coordinates'] = 'B1';
            $files['logo_cinco']['place'] = 3;
        }

        if($id->empresa=='LITEYCA'){
            $files['logo_liteyca']['name'] = 'Logo_liteyca';
            $files['logo_liteyca']['description'] = 'Logo de liteyca';
            $files['logo_liteyca']['path'] = public_path('/img/LITEYCA.jpg');
            $files['logo_liteyca']['height'] = 90;
            $files['logo_liteyca']['coordinates'] = 'B1';
            $files['logo_liteyca']['place'] = 3;
        }
        if($id->empresa=='INMEL'){
            $files['logo_inmel']['name'] = 'Logo_inmel';
            $files['logo_inmel']['description'] = 'Logo de inmel';
            $files['logo_inmel']['path'] = public_path('/img/inmel.jpeg');
            $files['logo_inmel']['height'] = 90;
            $files['logo_inmel']['coordinates'] = 'B1';
            $files['logo_inmel']['place'] = 3;
        }

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
        // return $id;
        // return view('execution_works.maintenance.operacion.export', compact('id','dates'));
        return (new msuOperationExport($id, $dates,$files))->download('OT'.$id->campus->OT.'_'.$id->campus->site_name.' SISTEMA PUESTA TIERRA.xlsx');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')){
            $operation = GeneralOperation::find($request->id);
            $file_exists = $operation->files->where('description',$request->name_d)->first();

            if ($file_exists){
                Storage::delete('public/upload/mintic/'.$file_exists->name);
            }
            $file = $request->file('file');

            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            if (!(isset($request->write) && $request->write == 'No' ) && ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg')) {

                $coordenadas = $this->coords($operation->campus->lat, $operation->campus->long);

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
                    $image->text($operation->campus->dep.'-'.$operation->campus->mun, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text($operation->campus->site_name, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text($operation->campus->dep, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text('#BTS'.$operation->campus->mun, $image->width() - 5, $image->height() - $height, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text('OT '.$operation->campus->OT, $image->width() - 5, $image->height() - $height, function($font) use($request) {
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
                    $image->text($operation->campus->population, $image->width() - 5, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5+$const);
                    $image->text($operation->campus->site_name, $image->width() - 5, $image->height() - $height, function($font) use($request,$const) {
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
            $operation->files()->create([
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
