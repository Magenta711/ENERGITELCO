<?php

namespace App\Http\Controllers\projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\interview;
use App\Models\project\Mintic\Mintic_School;
use Illuminate\Support\Facades\Storage;
use App\Notifications\notificationMain;
use Image;
use App\User;

class MinticController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
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
        $request['status'] = ($request->value_send == 'Firmar') ? 0 : 4;
        
        $users = User::where('state',1)->get();
        foreach ($users as $user) {
            if($request->value_send == 'Firmar'){
                if ($user->hasPermissionTo('Crear proyectos de MINTIC')) {  
                    $user->notify(new notificationMain($id->id,'Proyecto MINTIC '.$id->id.' por aprobar ','project/mintic/ec/show/'));
                }
            }else{
                if ($user->hasPermissionTo('Aprobar proyectos de MINTIC')) {  
                    $user->notify(new notificationMain($id->id,'Proyecto MINTIC '.$id->id.' modificado ','project/mintic/ec/show/'));
                }
            }
        }
        $id->update($request->all());
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

            $file_exists = $mintic->files->where('description',$request->name_d)->first();

            if ($file_exists){
                Storage::delete('public/upload/mintic/'.$file_exists->name);
            }
            $file = $request->file('file');
            
            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $text = $mintic->name.', '.$mintic->mun.', '.$mintic->dep;
                $text2 = $mintic->lat.' '.$mintic->long.', '.$mintic->height.'.0 m';
                $text3 = $mintic->date.' '.$mintic->time;

                $image = Image::make($request->file);
                $image->resize(null, 400, function ($constraint) {
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
        return view('projects.mintic.pintures',compact('id' ));
    }
    
    public function install($id)
    {
        $id = Mintic_School::with(['files'])->find($id);
        return view('projects.mintic.install',compact('id' ));
    }

    public function upload_install(Request $request)
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
                if ($request->vol && $request->vol == 2) {
                    $text = $mintic->mun.', '.$mintic->dep.', '.$mintic->population;
                    $text2 = $mintic->long.' / '.$mintic->lat;
                    $text3 = $mintic->date_install && $mintic->time_install ? $mintic->date_install.' '.$mintic->time_install : now()->format('Y-m-d H:i:s');
    
                    $image = Image::make($request->file);
                    $image->resize(null, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    
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
                    $text3 = $mintic->date_install && $mintic->time_install ? $mintic->date_install.' '.$mintic->time_install : now()->format('Y-m-d H:i:s');
    
                    $image = Image::make($request->file);
                    $image->resize(null, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });

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
                $image->resize(null, 500, function ($constraint) {
                    $constraint->aspectRatio();
                });
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
}