<?php

namespace App\Http\Controllers\logistics_infrastructure;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Work3;
use App\User;
use App\Models\general_setting;
use App\Models\invVehicle;
use App\Models\system_setting;
use App\Models\SystemMessages;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use App\Notifications\notificationMain;

class detailedInspectionVehicles extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Aprobar solicitud de Inspección detallada de vehículos|Consultar inspecciones detalladas de vehículos|Descargar PDF de inspecciones detalladas de vehículos|Digitar formulario de inspección detallada de vehículos|Eliminar formato de inspecciones detalladas de vehículos',['only' => ['index']]);
        $this->middleware('permission:Consultar inspecciones detalladas de vehículos|Aprobar solicitud de Inspección detallada de vehículos',['only' => ['show']]);
        $this->middleware('permission:Descargar PDF de inspecciones detalladas de vehículos',['only' => ['download']]);
        $this->middleware('permission:Digitar formulario de inspección detallada de vehículos',['only' => ['create','store']]);
        $this->middleware('permission:Eliminar formato de inspecciones detalladas de vehículos',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar solicitud de Inspección detallada de vehículos',['only' => ['approve']]);
        $this->message = SystemMessages::where('state',1)->where('name','Envio de formatos')->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_vehicles = Work3::with(['responsableAcargo','coordinadorAcargo'])->get();
        return view('logistics_infrastructure.detail_vehicle.index',compact('detail_vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::where('state',1)->with('roles')->get();
        $message = $this->message;
        $vehicles = invVehicle::where('status','!=',0)->get();
        return view('logistics_infrastructure.detail_vehicle.create',compact('usuarios','message','vehicles'));
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
            'cedula_responsable'=>['required'],
            'condutor'=>['required'],
            // 'placa_vehiculo'=>['required'],
            // 'vehicle_id'=>['required'],
        ]);

        $id= Work3::create($request->all());
        if($request->hasFile('foto_1')){
            $file=$request->file('foto_1');
            $name1= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name1));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name1);
            }
        }else {
            $name1 = "";
        }
        if($request->hasFile('foto_2')){
            $file=$request->file('foto_2');
            $name2= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name2));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name2);
            }
        }else {
            $name2 = "";
        }
        if($request->hasFile('foto_3')){
            $file=$request->file('foto_3');
            $name3= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name3));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name3);
            }
        }else {
            $name3 = "";
        }
        if($request->hasFile('foto_4')){
            $file=$request->file('foto_4');
            $name4= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name4));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name4);
            }
        }else {
            $name4 = "";
        }
        if($request->hasFile('foto_5')){
            $file=$request->file('foto_5');
            $name5= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name5));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name5);
            }
        }else {
            $name5 = "";
        }
        if($request->hasFile('foto_6')){
            $file=$request->file('foto_6');
            $name6= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name6));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name6);
            }
        }else {
            $name6 = "";
        }
        if($request->hasFile('foto_7')){
            $file=$request->file('foto_7');
            $name7= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name7));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name7);
            }
        }else {
            $name7 = "";
        }
        if($request->hasFile('foto_8')){
            $file=$request->file('foto_8');
            $name8= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name8));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name8);
            }
        }else {
            $name8 = "";
        }
        if($request->hasFile('foto_9')){
            $file=$request->file('foto_9');
            $name9= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name9));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name9);
            }
        }else {
            $name9 = "";
        }
        if($request->hasFile('foto_10')){
            $file=$request->file('foto_10');
            $name10= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name10));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name10);
            }
        }else {
            $name10 = "";
        }
        if($request->hasFile('foto_11')){
            $file=$request->file('foto_11');
            $name11= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name11));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name11);
            }
        }else {
            $name11 = "";
        }
        if($request->hasFile('foto_12')){
            $file=$request->file('foto_12');
            $name12= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name12));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name12);
            }
        }else {
            $name12 = "";
        }
        if($request->hasFile('foto_13')){
            $file=$request->file('foto_13');
            $name13= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name13));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name13);
            }
        }else {
            $name13 = "";
        }
        if($request->hasFile('foto_14')){
            $file=$request->file('foto_14');
            $name14= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name14));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name14);
            }
        }else {
            $name14 = "";
        }
        if($request->hasFile('foto_15')){
            $file=$request->file('foto_15');
            $name15= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name15));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name15);
            }
        }else {
            $name15 = "";
        }
        if($request->hasFile('foto_16')){
            $file=$request->file('foto_16');
            $name16= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name16));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name16);
            }
        }else {
            $name16 = "";
        }
        if($request->hasFile('foto_17')){
            $file=$request->file('foto_17');
            $name17= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name17));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name17);
            }
        }else {
            $name17 = "";
        }
        if($request->hasFile('foto_18')){
            $file=$request->file('foto_18');
            $name18= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name18));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name18);
            }
        }else {
            $name18 = "";
        }
        if($request->hasFile('foto_19')){
            $file=$request->file('foto_19');
            $name19= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name19));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name19);
            }
        }else {
            $name19 = "";
        }
        if($request->hasFile('foto_20')){
            $file=$request->file('foto_20');
            $name20= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name20));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name20);
            }
        }else {
            $name20 = "";
        }
        if($request->hasFile('foto_21')){
            $file=$request->file('foto_21');
            $name21= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name21));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name21);
            }
        }else {
            $name21 = "";
        }
        if($request->hasFile('foto_22')){
            $file=$request->file('foto_22');
            $name22= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name22));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name22);
            }
        }else {
            $name22 = "";
        }
        if($request->hasFile('foto_23')){
            $file=$request->file('foto_23');
            $name23= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name23));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name23);
            }
        }else {
            $name23 = "";
        }
        if($request->hasFile('foto_24')){
            $file=$request->file('foto_24');
            $name24= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name24));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name24);
            }
        }else {
            $name24 = "";
        }
        if($request->hasFile('foto_25')){
            $file=$request->file('foto_25');
            $name25= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name25));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name25);
            }
        }else {
            $name25 = "";
        }
        if($request->hasFile('foto_26')){
            $file=$request->file('foto_26');
            $name26= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name26));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name26);
            }
        }else {
            $name26 = "";
        }
        if($request->hasFile('foto_27')){
            $file=$request->file('foto_27');
            $name27= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name27));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name27);
            }
        }else {
            $name27 = "";
        }
        if($request->hasFile('foto_28')){
            $file=$request->file('foto_28');
            $name28= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name28));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name28);
            }
        }else {
            $name28 = "";
        }
        if($request->hasFile('foto_29')){
            $file=$request->file('foto_29');
            $name29= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name29));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name29);
            }
        }else {
            $name29 = "";
        }
        if($request->hasFile('foto_30')){
            $file=$request->file('foto_30');
            $name30= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name30));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name30);
            }
        }else {
            $name30 = "";
        }
        if($request->hasFile('foto_31')){
            $file=$request->file('foto_31');
            $name31= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name31));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name31);
            }
        }else {
            $name31 = "";
        }
        if($request->hasFile('foto_32')){
            $file=$request->file('foto_32');
            $name32= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name32));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name32);
            }
        }else {
            $name32 = "";
        }
        if($request->hasFile('foto')){
            $file=$request->file('foto');
            $name= time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                ->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('storage/human_management/detailed_inspection_vehicles/'.$name));
            }else {
                $file->move(public_path().'/storage/human_management/detailed_inspection_vehicles/',$name);
            }
        }else {
            $name = "";
        }
        $id->update([
            'responsable' => auth()->id(),
            "foto_1"=>$name1,
            "foto_2"=>$name2,
            "foto_3"=>$name3,
            "foto_4"=>$name4,
            "foto_5"=>$name5,
            "foto_6"=>$name6,
            "foto_7"=>$name7,
            "foto_8"=>$name8,
            "foto_9"=>$name9,
            "foto_10"=>$name10,
            "foto_11"=>$name11,
            "foto_12"=>$name12,
            "foto_13"=>$name13,
            "foto_14"=>$name14,
            "foto_15"=>$name15,
            "foto_16"=>$name16,
            "foto_17"=>$name17,
            "foto_18"=>$name18,
            "foto_19"=>$name19,
            "foto_20"=>$name20,
            "foto_21"=>$name21,
            "foto_22"=>$name22,
            "foto_23"=>$name23,
            "foto_24"=>$name24,
            "foto_25"=>$name25,
            "foto_26"=>$name26,
            "foto_27"=>$name27,
            "foto_28"=>$name28,
            "foto_29"=>$name29,
            "foto_30"=>$name30,
            "foto_31"=>$name31,
            "foto_32"=>$name32,
            "foto"=>$name,
        ]);
        
        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Aprobar solicitud de Inspección detallada de vehículos')){
                $user->notify(new notificationMain($id->id,'Solicitud de inspección de vehículo '.$id->id,'logistics_infrastructure/detailed_inspection_vehicles/show/'));
            }
        }
        
        Mail::send('logistics_infrastructure.detail_vehicle.mail.main', ['format' => $id], function ($menssage) use ($id)
        {
            $responsable = User::find($id->responsable);
            $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
            $company = general_setting::where('state',1)->pluck('company')->first();
            $email = explode(';',$emails);
            for ($i=0; $i < count($email); $i++) { 
                if($email[$i] != ''){
                    $menssage->to(trim($email[$i]),$company);
                }
            }
            $menssage->to($responsable->email,$responsable->name)->subject("Energitelco S.A.S, Revision satisfactoria de Vehiculo - L-FR-08_0".$id->id);
        });

        return redirect()->route('detailed_inspection_vehicles')->with('success','Se ha enviado el formulario correctamente para su aprobación por parte de un coordinador.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Work3::with([
            'coordinadorAcargo' =>function ($query)
            {
                $query->with('roles');
            },
            'responsableAcargo' =>function ($query)
            {
                $query->with('roles');
            },
            'inspeccionador' =>function ($query)
            {
                $query->with('position');
            },
        ])->find($id);
        
        return view('logistics_infrastructure.detail_vehicle.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work3 $id)
    {
        $id->delete();
        return redirect()->route('detailed_inspection_vehicles')->with('success','Se ha eliminado el formato correctamente');
    }

     /**
     * Download in pdf the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download(Work3 $id)
    {
        $pdf = PDF::loadView('logistics_infrastructure/detail_vehicle/pdf/main',['trabajo' => $id]);
        return $pdf->download($id->codigo_formulario.'-'.$id->id.'_INSPECCION_DETALLADA_DE_VEHICULOS.pdf');
    }
    
    /**
     * Aprove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function approve(Request $request,Work3 $id)
    {
        if ($request->status == 'Aprobado') {
            $id->update([
                'estado'=>"Aprobado",
                'commentary'=>$request->commentary,
                'fecha_aprobacion'=>now()->format('Y-m-d'),
                'hora_aprobacion'=>now()->format('H:i:s'),
                'coordinador' => auth()->id(),
            ]);
            
            // Notification
            $id->inspeccionador->notify(new notificationMain($id->id,'Se ha aprobado la solicitud de inspección de vehículo '.$id->id,'logistics_infrastructure/detailed_inspection_vehicles/show/'));
            
            //Correo por si aprueba
            Mail::send('logistics_infrastructure.detail_vehicle.mail.main', ['format' => $id], function ($menssage) use ($id)
            {
                $emails = system_setting::where('state',1)->pluck('approval_emails')->first();
                $company = general_setting::where('state',1)->pluck('company')->first();
                $email = explode(';',$emails);
                for ($i=0; $i < count($email); $i++) {
                    if($email[$i] != ''){
                        $menssage->to(trim($email[$i]),$company);
                    }
                }
                $usuario = User::find($id->responsable);
                $menssage->to($usuario->email,$usuario->name)->subject("Energitelco S.A.S , Revision satisfactoria de Vehículo y aprobada L-FR-08_0".$id->id);
            });
    
            return redirect()->route('approval')->with(['success'=>'Se ha aprobado la inspección de vehículo '.$id->id.' correctamente','sudmenu'=>3]);
        }else {
            $id->update([
                'estado'=>"No aprobado",
                'commentary' => $request->commentary,
                'coordinador' => auth()->id(),
            ]);
            
            $id->inspeccionador->notify(new notificationMain($id,'No se aprobó la solicitud de inspección de vehículo '.$id->id,'logistics_infrastructure/detailed_inspection_vehicles/show/'));
    
            return redirect()->route('approval')->with(['success'=>'Se ha desaprobado la inspección de vehículo correctamente','sudmenu'=>3]);
        }
    }
}
