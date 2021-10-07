<?php

namespace App\Http\Controllers\projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\project\Mintic\Mintic_School;
use App\Models\project\Mintic\inventory\EquimentDetail;
use Illuminate\Support\Facades\Storage;
use App\Notifications\notificationMain;
use App\Models\project\Mintic\mintic_maintenance;
use Image;
use App\User;
use App\Exports\minticMaintenanceExport;
use App\Models\project\Mintic\miniticMaintenanceActivityDetail;
use App\Models\project\Mintic\miniticMaintenanceEquipment;
use App\Models\project\Mintic\MinticMaintenanceActivity;
use App\Models\project\Mintic\MinticVisit;
use App\Models\system_setting;

class MinticController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de proyectos de MINTIC|Crear proyectos de MINTIC|Eliminar proyectos de MINTIC|Ver proyectos de MINTIC|Editar proyectos de MINTIC|Aprobar proyectos de MINTIC',['only' => ['index']]);
        $this->middleware('permission:Ver proyectos de MINTIC',['only' => ['show']]);
        $this->middleware('permission:Editar proyectos de MINTIC',['only' => ['edit','update']]);
        $this->middleware('permission:Crear proyectos de MINTIC',['only' => ['create','store','create2','store2','create3','store3']]);
        $this->middleware('permission:Eliminar proyectos de MINTIC',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar proyectos de MINTIC',['only' => ['approval','not_approval']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mintics = Mintic_School::with('technical')->get();
        return view('projects.mintic.index',compact('mintics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('state',1)->get();
        return view('projects.mintic.create',compact('users'));
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
            'name' => ['required'],
            'mun' => ['required'],
            'dep' => ['required'],
        ]);
        $request['responsable_id'] = auth()->id();
        $request['status'] = 4;
        $id = Mintic_School::create($request->all());

        $users = User::where('state',1)->get();

        foreach ($request->date_ec as $key => $value) {
            if ($value) {
                MinticVisit::create([
                    'date'=>$value,
                    'project_id'=>$id->id,
                    'time'=>$request->time_ec[$key],
                    'technical_id'=>$request->technical_id_ec[$key],
                    'commentary'=>$request->commentary_ec[$key],
                    'type' => 'ec',
                    'status' => 0
                ]);
            }
        }
        foreach ($request->date_install as $key => $value) {
            if ($value) {
                MinticVisit::create([
                    'date'=>$value,
                    'project_id'=>$id->id,
                    'time'=>$request->time_install[$key],
                    'technical_id'=>$request->technical_id_install[$key],
                    'commentary'=>$request->commentary_install[$key],
                    'type' => 'install',
                    'status' => 0
                ]);
            }
        }
        foreach ($request->date_integration as $key => $value) {
            if ($value) {
                MinticVisit::create([
                    'date'=>$value,
                    'project_id'=>$id->id,
                    'time'=>$request->time_integration[$key],
                    'technical_id'=>$request->technical_id_integration[$key],
                    'commentary'=>$request->commentary_integration[$key],
                    'type' => 'integration',
                    'status' => 0
                ]);
            }
        }
        foreach ($request->date_maintenance as $key => $value) {
            if ($value) {
                MinticVisit::create([
                    'date'=>$value,
                    'project_id'=>$id->id,
                    'time'=>$request->time_maintenance[$key],
                    'technical_id'=>$request->technical_id_maintenance[$key],
                    'commentary'=>$request->commentary_maintenance[$key],
                    'type' => 'maintenance',
                    'status' => 0
                ]);
            }
        }

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de proyectos de MINTIC')) {
                $user->notify(new notificationMain($id->id,'Nuevo proyecto MINTIC '.$id->id,'project/mintic/ec/show/'));
            }
        }
        
        return redirect()->route('mintic')->with('success','Se ha creado el proyecto correctamente');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Mintic_School::with(['technical','files'])->find($id);
        return view('projects.mintic.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Mintic_School::with(['technical'])->find($id);
        $users = User::where('state',1)->get();
        return view('projects.mintic.edit',compact('id','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mintic_School $id)
    {
        $id->update($request->all());
        MinticVisit::where('project_id',$id->id)->delete();
        foreach ($request->date_ec as $key => $value) {
            if ($value) {
                MinticVisit::create([
                    'date'=>$value,
                    'project_id'=>$id->id,
                    'time'=>$request->time_ec[$key],
                    'technical_id'=>$request->technical_id_ec[$key],
                    'commentary'=>$request->commentary_ec[$key],
                    'type' => 'ec',
                    'status' => 0
                ]);
            }
        }
        foreach ($request->date_install as $key => $value) {
            if ($value) {
                MinticVisit::create([
                    'date'=>$value,
                    'project_id'=>$id->id,
                    'time'=>$request->time_install[$key],
                    'technical_id'=>$request->technical_id_install[$key],
                    'commentary'=>$request->commentary_install[$key],
                    'type' => 'install',
                    'status' => 0
                ]);
            }
        }
        foreach ($request->date_integration as $key => $value) {
            if ($value) {
                MinticVisit::create([
                    'date'=>$value,
                    'project_id'=>$id->id,
                    'time'=>$request->time_integration[$key],
                    'technical_id'=>$request->technical_id_integration[$key],
                    'commentary'=>$request->commentary_integration[$key],
                    'type' => 'integration',
                    'status' => 0
                ]);
            }
        }
        foreach ($request->date_maintenance as $key => $value) {
            if ($value) {
                MinticVisit::create([
                    'date'=>$value,
                    'project_id'=>$id->id,
                    'time'=>$request->time_maintenance[$key],
                    'technical_id'=>$request->technical_id_maintenance[$key],
                    'commentary'=>$request->commentary_maintenance[$key],
                    'type' => 'maintenance',
                    'status' => 0
                ]);
            }
        }

        return redirect()->route('mintic')->with('success','Se ha actualizado el proyecto correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mintic_School $id)
    {
        $id->delete();
        return redirect()->route('mintic')->with('success','Se ha eliminado el proyecto correctamente');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')){
            $mintic = Mintic_School::find($request->id);

            $visit = MinticVisit::where('project_id',$request->id)->where('type','ec')->first();

            $file_exists = $mintic->files->where('description',$request->name_d)->first();

            if ($file_exists){
                Storage::delete('public/upload/mintic/'.$file_exists->name);
            }
            $file = $request->file('file');
            
            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $text = $mintic->name.', '.$mintic->mun.', '.$mintic->dep;
                $text2 = $mintic->lat.' '.$mintic->long.', '.$mintic->height.'.0 m';
                $text3 = $visit ? $visit->date.' '.$visit->time : now()->format('Y-m-d H:i:s');

                $image = Image::make($request->file);
                if ($request->size != 'org') {
                    $image->resize(null, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    if ($request->vol && $request->vol != '') {
                        $image->text($request->vol, $image->width() - 10, $image->height() - 62, function($font) use($request) {
                            $font->file(public_path('fonts/Calibri/Calibri-Bold.TTF'));
                            $font->size(11);
                            $font->color($request->color);
                            $font->align('right');
                            $font->valign('top');
                            $font->angle(0);
                        });
                    }
    
                    $image->text('COD '.$mintic->code, $image->width() - 10, $image->height() - 49, function($font) use($request) {
                        $font->file(public_path('fonts/Calibri/Calibri-Bold.TTF'));
                        $font->size(11);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $image->text($text, $image->width() - 10, $image->height() - 36, function($font) use($request) {
                        $font->file(public_path('fonts/Calibri/Calibri-Bold.TTF'));
                        $font->size(11);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $image->text($text2, $image->width() - 10, $image->height() - 23, function($font) use($request) {
                        $font->file(public_path('fonts/Calibri/Calibri-Bold.TTF'));
                        $font->size(11);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $image->text($text3, $image->width() - 10, $image->height() - 10, function($font) use($request) {
                        $font->file(public_path('fonts/Calibri/Calibri-Bold.TTF'));
                        $font->size(11);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $size = '650';
                }else {
                    $size = $file->getClientSize() / 1000;
                    $const = 0.03 * $size;
                    $height = ($const / 4);
                    $image->text($text3, $image->width() - 10, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Calibri/Calibri-Bold.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5+$const);
                    $image->text($text2, $image->width() - 10, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Calibri/Calibri-Bold.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5+$const);
                    $image->text($text.' ('.$const.')', $image->width() - 10, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Calibri/Calibri-Bold.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5+$const);
                    $image->text('COD '.$mintic->code, $image->width() - 10, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Calibri/Calibri-Bold.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    
                    
                    if ($request->vol && $request->vol != '') {
                        $height += (5+$const);
                        $image->text($request->vol, $image->width() - 10, $image->height() - $height, function($font) use($request,$const) {
                            $font->file(public_path('fonts/Calibri/Calibri-Bold.TTF'));
                            $font->size($const);
                            $font->color($request->color);
                            $font->align('right');
                            $font->valign('top');
                            $font->angle(0);
                        });
                    }
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

    public function approval(Mintic_School $id)
    {
        $id->update(['status' => 1,'approver_id' => auth()->id()]);
        $users = User::where('state',1)->get();
        
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Crear proyectos de MINTIC')) {
                $user->notify(new notificationMain($id->id,'Proyecto MINTIC '.$id->id.' aprobado','project/mintic/ec/show/'));
            }
        }
        return redirect()->route('approval')->with(['success'=>'Se ha aprobado el proyecto correctamente','sudmenu'=>16]);
    }
    
    public function not_approval(Mintic_School $id)
    {
        $id->update(['status' => 2,'approver_id' => auth()->id()]);
        $users = User::where('state',1)->get();
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Crear proyectos de MINTIC')) {
                $user->notify(new notificationMain($id->id,'Proyecto MINTIC '.$id->id.' desaprobado','project/mintic/ec/show/'));
            }
        }
        return redirect()->route('approval')->with(['success'=>'Se ha desaprobado el proyecto correctamente','sudmenu'=>16]);
    }

    public function pintures($id)
    {
        $id = Mintic_School::with(['files'])->find($id);
        return view('projects.mintic.pintures',compact('id'));
    }
    
    public function install($id)
    {
        $id = Mintic_School::with(['files'])->find($id);
        return view('projects.mintic.install',compact('id'));
    }

    public function destroy_maintenance($id,mintic_maintenance $item)
    {
        $item->delete();
        return redirect()->route('mintic_maintenance',$id)->with(['success'=>'Se ha eliminado el mantenimiento correctamente']);
    }

    public function upload_install(Request $request)
    {
        if ($request->hasFile('file')){
            $mintic = Mintic_School::find($request->id);
            $visit = MinticVisit::where('project_id',$request->id)->where('type','install')->first();
            $file_exists = $mintic->files->where('description',$request->name_d)->first();

            if ($file_exists){
                Storage::delete('public/upload/mintic/'.$file_exists->name); 
            }
            $file = $request->file('file');
            
            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                if ($request->vol && $request->vol == 2) {
                    $text = $mintic->mun.', '.$mintic->dep.', '.$mintic->population;
                    $text2 = $mintic->long.' / '.$mintic->lat;
                    $text3 = $visit ? $visit->date.' '.$visit->time : now()->format('Y-m-d H:i:s');
    
                    $image = Image::make($request->file);
                    if ($request->size != 'org') {
                        $image->resize(null, 500, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }
                    
                    $image->text('CLARO MINTIC 7K', $image->width() - 10, $image->height() - 86, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size(20);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });

                    $image->text('COD '.$mintic->code.' '.$mintic->name, $image->width() - 10, $image->height() - 68, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size(20);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });

                    $image->text($text, $image->width() - 10, $image->height() - 50, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size(20);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $image->text($text2, $image->width() - 10, $image->height() - 32, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size(20);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $image->text($text3, $image->width() - 10, $image->height() - 14, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size(20);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $size = '650';
                    $image->save(public_path('storage/upload/mintic/'.$name));
                }else {
                    $text = $mintic->name;
                    $text2 = $mintic->long.' / '.$mintic->lat;
                    $text3 = $visit ? $visit->date.' '.$visit->time : now()->format('Y-m-d H:i:s');
    
                    $image = Image::make($request->file);
                    if ($request->size != 'org') {
                        $image->resize(null, 500, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }

                    $image->text('COD '.$mintic->code, $image->width() - 10, $image->height() - 68, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size(20);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });

                    $image->text($text, $image->width() - 10, $image->height() - 50, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size(20);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $image->text($text2, $image->width() - 10, $image->height() - 32, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size(20);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $image->text($text3, $image->width() - 10, $image->height() - 14, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size(20);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $size = '650';
                    $image->save(public_path('storage/upload/mintic/'.$name));
                }
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

    public function tss($id)
    {
        $id = Mintic_School::with(['files'])->find($id);
        return view('projects.mintic.tss3',compact('id' ));
    }

    public function upload_tss(Request $request)
    {
        if ($request->hasFile('file')){
            $mintic = Mintic_School::find($request->id);
            $file_exists = $mintic->files->where('description',$request->name_d)->first();
            if ($file_exists){
                Storage::delete('public/upload/mintic/'.$file_exists->name); 
            }
            $file = $request->file('file');
            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($request->file);
                if ($request->size != 'org') {
                    $image->resize(null, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                $size = '650';
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

    public function maintenance(Mintic_School $id)
    {
        $maintenances = mintic_maintenance::get();
        return view('projects.mintic.maintenance.index',compact('id','maintenances'));
    }

    public function create_maintenance(Mintic_School $id)
    {
        $equipments = EquimentDetail::get();
        $activities = MinticMaintenanceActivity::get();
        return view('projects.mintic.maintenance.create',compact('id','equipments','activities'));
    }

    public function store_maintenance(Request $request,$id)
    {
        $request['project_id'] = $id;
        $request['status'] = 1;
        $main = mintic_maintenance::create($request->all());

        if (isset($request->detail_retired)) {
            foreach ($request->detail_retired as $key => $value) {
                miniticMaintenanceEquipment::create([
                    'serial' => $request->serial_retired[$key],
                    'detail_id' => $request->detail_retired[$key],
                    'maintenance_id' => $main->id,
                    'type' => 'retired'
                ]);
            }
        }
        if (isset($request->detail_install)) {
            foreach ($request->detail_install as $key => $value) {
                miniticMaintenanceEquipment::create([
                    'serial' => $request->serial_install[$key],
                    'detail_id' => $request->detail_install[$key],
                    'maintenance_id' => $main->id,
                    'type' => 'install'
                ]);
            }
        }
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
    public function show_maintenance($id,mintic_maintenance $item)
    {
        $equipments = EquimentDetail::get();
        $activities = MinticMaintenanceActivity::get();
        return view('projects.mintic.maintenance.show',compact('id','item','equipments','activities'));
    }
    public function photos_maintenance($id,mintic_maintenance $item)
    {
        return view('projects.mintic.maintenance.photos',compact('id','item'));
    }

    public function edit_maintenance($id,mintic_maintenance $item)
    {
        $equipments = EquimentDetail::get();
        $activities = MinticMaintenanceActivity::get();
        return view('projects.mintic.maintenance.edit',compact('id','item','equipments','activities'));
    }

    public function update_maintenance(Request $request,$id,mintic_maintenance $item)
    {
        $id->update($request->all());

        return redirect()->route('mintic_maintenance',$id)->with('success','Se ha actualizado el mantenimiento correctamente');
    }

    public function export_maintenance($id,mintic_maintenance $item)
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

        return (new minticMaintenanceExport($item,$equipments,$files,$activities))->download($id.'_mintic_maintenance.xlsx');
    }

    public function upload_maintenance(Request $request)
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
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $text2 = $mintic->project->long.' / '.$mintic->project->lat;
                $text3 = $visit ? $visit->date.' '.$visit->time : now()->format('Y-m-d H:i:s');

                $image = Image::make($request->file);
                if ($request->size != 'org') {
                    $image->resize(null, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image->text('ID '.$mintic->code, $image->width() - 10, $image->height() - 81, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size(20);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
    
                    $image->text($mintic->name, $image->width() - 10, $image->height() - 59, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size(20);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
    
                    $image->text($text2, $image->width() - 10, $image->height() - 37, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size(20);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $image->text($text3, $image->width() - 10, $image->height() - 15, function($font) use($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size(20);
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
                    $image->text($text3, $image->width() - 10, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5+$const);
                    $image->text($text2, $image->width() - 10, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5+$const);
                    $image->text($mintic->name, $image->width() - 10, $image->height() - $height, function($font) use($request,$const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5+$const);
                    $image->text('ID '.$mintic->code, $image->width() - 10, $image->height() - $height, function($font) use($request,$const) {
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