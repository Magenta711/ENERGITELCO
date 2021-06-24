<?php

namespace App\Http\Controllers\projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\Exports\CleatingExport;
use App\Models\project\Clearing;
use App\Models\project\ClearingInventory;
use App\Notifications\notificationMain;
use App\User;
use Illuminate\Support\Facades\Storage;

class clearingController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
        $this->middleware('verified');
        $this->middleware('permission:Lista de proyectos de desmonte|Crear proyectos de desmonte|Eliminar proyectos de desmonte|Ver proyectos de desmonte|Editar proyectos de desmonte|Aprobar proyectos de desmonte',['only' => ['index']]);
        $this->middleware('permission:Ver proyectos de desmonte',['only' => ['show']]);
        $this->middleware('permission:Editar proyectos de desmonte',['only' => ['edit','update']]);
        $this->middleware('permission:Crear proyectos de desmonte',['only' => ['create','store','create2','store2','create3','store3']]);
        $this->middleware('permission:Eliminar proyectos de desmonte',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar proyectos de desmonte',['only' => ['approval','not_approval']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clearings = Clearing::with(['responsable'])->get();
        return view('projects.clearings.index',compact('clearings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.clearings.create');
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
            'date' => ['required'],
            'id_ot' => ['required'],
            'ot_rr' => ['required'],
            'region' => ['required'],
            'estation_a' => ['required'],
            'estation_b' => ['required'],
            'brand_radion' => ['required'],
            'model' => ['required'],
            'banda' => ['required'],
            'sud_banda' => ['required'],
            'concept_technical' => ['required'],
            'concept_fisico' => ['required'],
        ]);
        $request['responsable_id'] = auth()->id();
        $request['status'] = 3;
        $id = Clearing::create($request->all());
        return redirect()->route('clearings_create2',$id->id);
    }

    public function create2(Request $request, Clearing $id)
    {
        if ($id->status == 3) {
            return view('projects.clearings.create2',compact('id'));
        }
        return redirect()->route('clearings_edit',$id->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request, Clearing $id)
    {
        return redirect()->route('clearings_create3',$id->id);
    }

    public function create3(Clearing $id)
    {
        if ($id->status == 3) {
            return view('projects.clearings.create3',compact('id'));
        }
        return redirect()->route('clearings_edit',$id->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store3(Request $request, Clearing $id)
    {
        $id->update([ 'status' => 4 ]);
        for ($i=0; $i < count($request->name_element); $i++) { 
            $clearing_inventory = ClearingInventory::create([
                'clearing_id' => $id->id,
                'name_element' => $request->name_element[$i],
                'code_material' => $request->code_material[$i],
                'station' => $request->estation[$i],
                'serial_part' => $request->serial_part[$i],
                'type_active' => $request->type_active[$i],
                'status' => 1
            ]);
            if ($request->hasFile('file')) {
                if ($file = $request->file('file')[$i]) {
                    $name = time().str_random().'.'.$file->getClientOriginalExtension();
                    $size = $file->getClientSize() / 1000;
                    $path = Storage::putFileAs('public/upload/clearing', $file, $name);
                    $clearing_inventory->file()->create([
                        'name' => $name,
                        'description' => $request->name_element[$i],
                        'size' => $size.' KB',
                        'url' => $path,
                        'type' => $file->getClientOriginalExtension(),
                        'state' => 1
                    ]);
                }
            }
        }

        $users = User::where('state',1)->get();
        
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de proyectos de desmonte')) {
                $user->notify(new notificationMain($id->id,'Nuevo proyecto de desmonte '.$id->id,'project/clearing/show/'));
            }
        }
        
        return redirect()->route('clearings')->with('success','Se ha creado el nuevo proyecto correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Clearing::with(['files',
            'inventories' => function ($query)
            {
                $query->with('file');
            }
        ])->find($id);
        return view('projects.clearings.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Clearing::with(['files',
            'inventories' => function ($query)
            {
                $query->with('file');
            }
        ])->find($id);
        
        if ($id->status == 4) {
            return view('projects.clearings.edit',compact('id'));
        }
        if ($id->status == 3) {
            return redirect()->route('clearings_create2',$id->id);
        }
        return redirect()->route('clearings');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clearing $id)
    {
        $request['status'] = ($request->value_send == 'Firmar') ? 0 : 4;
        $id->update($request->all());

        // Cambiar el estado de todos los inventarios
        ClearingInventory::where('clearing_id',1)->update(['status' => 0]);
        // agregar inventario codigo de arriba
        for ($i=0; $i < count($request->serial_part); $i++) {
            if ($request->estation[$i] == 'a') {
                if ($request->inv_id[$i]) {
                    $clearing_inventory = ClearingInventory::where('id',$request->inv_id[$i])->update([
                        'name_element' => $request->name_element[$i],
                        'code_material' => $request->code_material[$i],
                        'serial_part' => $request->serial_part[$i],
                        'type_active' => $request->type_active[$i],
                        'status' => 1
                    ]);
                    if ($request->hasFile('file')) {
                        if ($file = $request->file('file')[$i]) {
                            $name = time().str_random().'.'.$file->getClientOriginalExtension();
                            $size = $file->getClientSize() / 1000;
                            $path = Storage::putFileAs('public/upload/clearing', $file, $name);
                            $clearing_inventory->file()->delete();
                            $clearing_inventory->file()->create([
                                'name' => $name,
                                'description' => $request->name_element[$i],
                                'size' => $size.' KB',
                                'url' => $path,
                                'type' => $file->getClientOriginalExtension(),
                                'state' => 1
                            ]);
                        }
                    }
                }else {
                    $clearing_inventory = ClearingInventory::create([
                        'clearing_id' => $id->id,
                        'name_element' => $request->name_element[$i],
                        'code_material' => $request->code_material[$i],
                        'station' => $request->estation[$i],
                        'serial_part' => $request->serial_part[$i],
                        'type_active' => $request->type_active[$i],
                        'status' => 1
                    ]);
                    if ($request->hasFile('file')) {
                        if ($file = $request->file('file')[$i]) {
                            $name = time().str_random().'.'.$file->getClientOriginalExtension();
                            $size = $file->getClientSize() / 1000;
                            $path = Storage::putFileAs('public/upload/clearing', $file, $name);
                            $clearing_inventory->file()->create([
                                'name' => $name,
                                'description' => $request->name_element[$i],
                                'size' => $size.' KB',
                                'url' => $path,
                                'type' => $file->getClientOriginalExtension(),
                                'state' => 1
                            ]);
                        }
                    }
                }
            }
        }
        for ($i=0; $i < count($request->serial_part); $i++) {
            if ($request->estation[$i] == 'b') {
                if ($request->inv_id[$i]) {
                    $clearing_inventory = ClearingInventory::where('id',$request->inv_id[$i])->update([
                        'name_element' => $request->name_element[$i],
                        'code_material' => $request->code_material[$i],
                        'serial_part' => $request->serial_part[$i],
                        'type_active' => $request->type_active[$i],
                        'status' => 1
                    ]);
                    if ($request->hasFile('file')) {
                        if ($file = $request->file('file')[$i]) {
                            $name = time().str_random().'.'.$file->getClientOriginalExtension();
                            $size = $file->getClientSize() / 1000;
                            $path = Storage::putFileAs('public/upload/clearing', $file, $name);
                            $clearing_inventory->file()->delete();
                            $clearing_inventory->file()->create([
                                'name' => $name,
                                'description' => $request->name_element[$i],
                                'size' => $size.' KB',
                                'url' => $path,
                                'type' => $file->getClientOriginalExtension(),
                                'state' => 1
                            ]);
                        }
                    }
                }else {
                    $clearing_inventory = ClearingInventory::create([
                        'clearing_id' => $id->id,
                        'name_element' => $request->name_element[$i],
                        'code_material' => $request->code_material[$i],
                        'station' => $request->estation[$i],
                        'serial_part' => $request->serial_part[$i],
                        'type_active' => $request->type_active[$i],
                        'status' => 1
                    ]);
                    if ($request->hasFile('file')) {
                        if ($file = $request->file('file')[$i]) {
                            $name = time().str_random().'.'.$file->getClientOriginalExtension();
                            $size = $file->getClientSize() / 1000;
                            $path = Storage::putFileAs('public/upload/clearing', $file, $name);
                            $clearing_inventory->file()->create([
                                'name' => $name,
                                'description' => $request->name_element[$i],
                                'size' => $size.' KB',
                                'url' => $path,
                                'type' => $file->getClientOriginalExtension(),
                                'state' => 1
                            ]);
                        }
                    }
                }
            }
        }
        
        ClearingInventory::where('status',0)->delete();
        
        $id->responsable->notify(new notificationMain($id->id,'Proyecto de desnomte fue editado '.$id->id,'project/clearing/show/'));
        
        return redirect()->route('clearings')->with('success','Se ha actualizado el nuevo proyecto correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clearing $id)
    {
        $id->delete();
        return redirect()->route('clearings')->with('success','Se ha eliminado el proyecto correctamente');
    }
    
    public function upload_file(Request $request)
    {
        if ($request->hasFile('file')){
            $clearing = Clearing::find($request->id);
            $file_exists = $clearing->files->where('description',$request->name_d)->first();
            if ($file_exists){
                Storage::delete('public/upload/clearing/'.$file_exists->name);
            }
            $file = $request->file('file');
            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                $image = Image::make($file->getRealPath())
                    ->resize(null, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(public_path('storage/upload/clearing/'.$name));
                $size = '8';
                $path = "public/upload/clearing/".$name;

            }else{
                $size = $file->getClientSize() / 1000;
                $path = Storage::putFileAs('public/upload/clearing', $file, $name);
            }
            if ($file_exists) {
                $file_exists->update([
                    'name' => $name,
                    'description' => $request->name_d,
                    'size' => $size.' KB',
                    'url' => $path,
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
            $clearing->files()->create([
                'name' => $name,
                'description' => $request->name_d,
                'commentary' => $request->commentary,
                'size' => $size.' KB',
                'url' => $path,
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

    public function approval(Clearing $id)
    {
        $id->update(['status' => 1,'approver_id' => auth()->id()]);
        $id->responsable->notify(new notificationMain($id->id,'Proyecto de desnomte '.$id->id.' fue aprobado','project/clearing/show/'));
        return redirect()->route('approval')->with(['success'=>'Se ha aprobado el proyecto correctamente','sudmenu'=>14]);
    }
    public function not_approval(Clearing $id)
    {
        $id->update(['status' => 2,'approver_id' => auth()->id()]);
        
        $id->responsable->notify(new notificationMain($id->id,'Proyecto de desnomte '.$id->id.' fue desaprobado','project/clearing/show/'));

        return redirect()->route('approval')->with(['success'=>'Se ha desaprobado el proyecto correctamente','sudmenu'=>14]);
    }

    public function export(Clearing $id)
    {
        $files['logo_claro']['name'] = 'Logo_Claro';
        $files['logo_claro']['description'] = 'Logo de Claro';
        $files['logo_claro']['path'] = public_path('/img/claro.png');
        $files['logo_claro']['height'] = 80;
        $files['logo_claro']['coordinates'] = 'B2';

        $files['logo_energitelco']['name'] = 'Logo_energitelco';
        $files['logo_energitelco']['description'] = 'Logo de Energitelco';
        $files['logo_energitelco']['path'] = public_path('/img/logo.png');
        $files['logo_energitelco']['height'] = 80;
        $files['logo_energitelco']['coordinates'] = 'J2';
        if ($id->files)
        {
            foreach ($id->files as $key => $value) {
                if ($value->commentary) {
                    $str = str_random();
                    $files[$str]['name'] = $value->name;
                    $files[$str]['description'] = $value->description;
                    $files[$str]['path'] = public_path('/storage/upload/clearing/'.$value->name);
                    $files[$str]['height'] = 200;
                    $files[$str]['coordinates'] = $value->commentary;
                }
            }
        }

        return (new CleatingExport($id, $files ))->download($id->id.'_SITE_FOLDER_GI_DESMONTE.xlsx');
    }
}
