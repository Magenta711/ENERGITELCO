<?php

namespace App\Http\Controllers\projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\project\route\routeBaseStation;
use App\Models\project\route\routeBaseStationType;
use App\Models\project\route\Routes;
use App\Models\project\route\routeService;
use App\Models\Responsable;
use App\Notifications\notificationMain;
use App\User;
use Illuminate\Support\Facades\Storage;


class RoutesProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('verified');
        $this->middleware('permission:Lista de proyectos de rutas|Crear proyectos de rutas|Eliminar proyectos de rutas|Ver proyectos de rutas|Editar proyectos de rutas|Aprobar proyectos de rutas',['only' => ['index']]);
        $this->middleware('permission:Ver proyectos de rutas',['only' => ['show']]);
        $this->middleware('permission:Editar proyectos de rutas',['only' => ['edit','update']]);
        $this->middleware('permission:Crear proyectos de rutas',['only' => ['create','store','create2','store2','create3','store3']]);
        $this->middleware('permission:Eliminar proyectos de rutas',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar proyectos de rutas',['only' => ['approval','not_approval']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Routes::with('responsable')->get();
        return view('projects.routes.index',compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('state',1)->get();
        return view('projects.routes.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['status'] = $request->send == 'Firmar' ? 3 : 4;
        $request['responsable_id'] = auth()->id();
        $route = Routes::create($request->all());
        if ($request->users_id) {
            for ($i=0; $i < count($request->users_id); $i++) {
                Responsable::create([
                    'user_id' => $request->users_id[$i],
                    'responsibles_type' => 'App\Models\project\route\Routes',
                    'responsibles_id' => $route->id,
                ]);
            }
        }
        $k = 0;
        $m = 0;
        for ($i=0; $i < count($request->name_service); $i++) { 
            $sv = routeService::create([
                'route_id' => $route->id,
                'num' => $i,
                'name_service' => $request->name_service[$i],
                'bsc_rnc' => $request->bsc_rnc[$i],
                'et_wbts' => $request->et_wbts[$i],
                'tecnology' => $request->tecnology[$i],
                'throughput' => $request->throughput[$i],
                'latency' => $request->latency[$i],
                'mtu' => $request->mtu[$i],
                'status' => 1
            ]);
            for ($j=0; $j < $request->num_stations[$i]; $j++) {
                $file_material = '';
                $file_equipment_room = '';
                $file_cabling = '';
                $file_inventory_before = '';
                $file_inventory_then = '';
                $file_marcked = '';
                if ($request->file_material[$k]) {
                    if ($request->hasFile('file_material')) {
                        $file = $request->file('file_material')[$k];
                        $file_material = time().str_random().'.'.$file->getClientOriginalExtension();
                        if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                            $image = Image::make($file->getRealPath())
                                ->resize(null, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save(public_path('storage/upload/routes/'.$file_material));
                        }else{
                            Storage::putFileAs('public/upload/routes', $file, $file_material);
                        }
                    }
                }
                if ($request->file_equipment_room[$k]) {
                    if ($request->hasFile('file_equipment_room')) {
                        $file = $request->file('file_equipment_room')[$k];
                        $file_equipment_room = time().str_random().'.'.$file->getClientOriginalExtension();
                        if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                            $image = Image::make($file->getRealPath())
                                ->resize(null, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save(public_path('storage/upload/routes/'.$file_equipment_room));

                        }else{
                            Storage::putFileAs('public/upload/routes', $file, $file_equipment_room);
                        }
                    }
                }
                if ($request->file_cabling[$k]) {
                    if ($request->hasFile('file_cabling')) {
                        $file = $request->file('file_cabling')[$k];
                        $file_cabling = time().str_random().'.'.$file->getClientOriginalExtension();
                        if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                            $image = Image::make($file->getRealPath())
                                ->resize(null, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save(public_path('storage/upload/routes/'.$file_cabling));

                        }else{
                            Storage::putFileAs('public/upload/routes', $file, $file_cabling);
                        }
                    }
                }
                if ($request->file_inventory_before[$k]) {
                    if ($request->hasFile('file_inventory_before')) {
                        $file = $request->file('file_inventory_before')[$k];
                        $file_inventory_before = time().str_random().'.'.$file->getClientOriginalExtension();
                        if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                            $image = Image::make($file->getRealPath())
                                ->resize(null, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save(public_path('storage/upload/routes/'.$file_inventory_before));

                        }else{
                            Storage::putFileAs('public/upload/routes', $file, $file_inventory_before);
                        }
                    }
                }
                if ($request->file_inventory_then[$k]) {
                    if ($request->hasFile('file_inventory_then')) {
                        $file = $request->file('file_inventory_then')[$k];
                        $file_inventory_then = time().str_random().'.'.$file->getClientOriginalExtension();
                        if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                            $image = Image::make($file->getRealPath())
                                ->resize(null, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save(public_path('storage/upload/routes/'.$file_inventory_then));

                        }else{
                            Storage::putFileAs('public/upload/routes', $file, $file_inventory_then);
                        }
                    }
                }
                if ($request->file_marcked[$k]) {
                    if ($request->hasFile('file_marcked')) {
                        $file = $request->file('file_marcked')[$k];
                        $file_marcked = time().str_random().'.'.$file->getClientOriginalExtension();
                        if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                            $image = Image::make($file->getRealPath())
                                ->resize(null, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save(public_path('storage/upload/routes/'.$file_marcked));

                        }else{
                            Storage::putFileAs('public/upload/routes', $file, $file_marcked);
                        }
                    }
                }
                $eb = routeBaseStation::create([
                    'service_id' => $sv->id,
                    'num' => $j,
                    'name_eb' => $request->name_eb[$k],
                    'file_material' => $file_material,
                    'file_equipment_room' => $file_equipment_room,
                    'file_cabling' => $file_cabling,
                    'file_inventory_before' => $file_inventory_before,
                    'file_inventory_then' => $file_inventory_then,
                    'file_marcked' => $file_marcked,
                    'chs_observation' => $request->chs_observation[$k],
                    'require_window' => $request->require_window[$k],
                    'status' => 1
                ]);
                for ($l=0; $l < 3; $l++) {
                    routeBaseStationType::create([
                        'eb_id' => $eb->id,
                        'type' => $request->type[$m],
                        'nemonico' => $request->nemonico[$m],
                        'reference' => $request->reference[$m],
                        'slot' => $request->slot[$m],
                        'port' => $request->port[$m]
                    ]);
                    $m++;
                }
                $k++;
            }
        }

        $users = User::where('state',1)->get();
        
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de proyectos de rutas')) {
                $user->notify(new notificationMain($route->id,'Nuevo proyecto de rutas '.$route->id,'project/routes/show/'));
            }
        }

        return redirect()->route('routes')->with('success','Se ha guardado el proyecto correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Routes::with(['users' =>function ($query)
        {
            $query->with('position');
        },
            'services' =>function ($query)
            {
                $query->with(['base_stations'=>function ($query)
                {
                    $query->with('types');
                }]);
            }
        ])->find($id);
        return view('projects.routes.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Routes::with(['users',
            'services' =>function ($query)
            {
                $query->with(['base_stations'=>function ($query)
                {
                    $query->with('types');
                }]);
            }
        ])->find($id);
        $users = User::where('state',1)->get();
        return view('projects.routes.edit',compact('id','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Routes $id)
    {
        $request['status'] = $request->send == 'Firmar' ? 3 : 4;
        $id->update($request->all());
        foreach ($id->services as $value) {
            $value->update([ 'status' => 0 ]);
        }
        $k = 0;
        $m = 0;
        if ($request->users_id) {
            for ($i=0; $i < count($request->users_id); $i++) {
                Responsable::create([
                    'user_id' => $request->users_id[$i],
                    'responsibles_type' => 'App\Models\project\route\Routes',
                    'responsibles_id' => $id->id,
                ]);
            }
        }
        for ($i=0; $i < count($request->name_service); $i++) {
            $sv = routeService::where('route_id',$id->id)->where('num',$i)->first();
            if ($sv) {
                $sv->update([
                    'name_service' => $request->name_service[$i],
                    'bsc_rnc' => $request->bsc_rnc[$i],
                    'et_wbts' => $request->et_wbts[$i],
                    'tecnology' => $request->tecnology[$i],
                    'throughput' => $request->throughput[$i],
                    'latency' => $request->latency[$i],
                    'mtu' => $request->mtu[$i],
                    'status' => 1
                ]);
                foreach ($sv->base_stations as $value) {
                    $value->update([ 'status' => 0 ]);
                }
            }else{
                $sv = routeService::create([
                    'route_id' => $id->id,
                    'num' => $i,
                    'name_service' => $request->name_service[$i],
                    'bsc_rnc' => $request->bsc_rnc[$i],
                    'et_wbts' => $request->et_wbts[$i],
                    'tecnology' => $request->tecnology[$i],
                    'throughput' => $request->throughput[$i],
                    'latency' => $request->latency[$i],
                    'mtu' => $request->mtu[$i],
                    'status' => 1
                ]);
            }
            for ($j=0; $j < $request->num_stations[$i]; $j++) {
                $eb = routeBaseStation::where('service_id',$sv->id)->where('num',$j)->first();
                $file_material = '';
                $file_equipment_room = '';
                $file_cabling = '';
                $file_inventory_before = '';
                $file_inventory_then = '';
                $file_marcked = '';
                if ($request->file_material[$k]) {
                    if ($request->hasFile('file_material')) {
                        $file = $request->file('file_material')[$k];
                        $file_material = time().str_random().'.'.$file->getClientOriginalExtension();
                        if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                            $image = Image::make($file->getRealPath())
                                ->resize(null, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save(public_path('storage/upload/routes/'.$file_material));

                        }else{
                            Storage::putFileAs('public/upload/routes', $file, $file_material);
                        }
                        if ($eb) {
                            $eb->update([
                                'file_material' => $file_material,
                            ]);
                        }
                    }
                }
                if ($request->file_equipment_room[$k]) {
                    if ($request->hasFile('file_equipment_room')) {
                        $file = $request->file('file_equipment_room')[$k];
                        $file_equipment_room = time().str_random().'.'.$file->getClientOriginalExtension();
                        if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                            $image = Image::make($file->getRealPath())
                                ->resize(null, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save(public_path('storage/upload/routes/'.$file_equipment_room));

                        }else{
                            Storage::putFileAs('public/upload/routes', $file, $file_equipment_room);
                        }
                        if ($eb) {
                            $eb->update([
                                'file_equipment_room' => $file_equipment_room,
                            ]);
                        }
                    }
                }
                if ($request->file_cabling[$k]) {
                    if ($request->hasFile('file_cabling')) {
                        $file = $request->file('file_cabling')[$k];
                        $file_cabling = time().str_random().'.'.$file->getClientOriginalExtension();
                        if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                            $image = Image::make($file->getRealPath())
                                ->resize(null, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save(public_path('storage/upload/routes/'.$file_cabling));

                        }else{
                            Storage::putFileAs('public/upload/routes', $file, $file_cabling);
                        }
                        if ($eb) {
                            $eb->update([
                                'file_cabling' => $file_cabling,
                            ]);
                        }
                    }
                }
                if ($request->file_inventory_before[$k]) {
                    if ($request->hasFile('file_inventory_before')) {
                        $file = $request->file('file_inventory_before')[$k];
                        $file_inventory_before = time().str_random().'.'.$file->getClientOriginalExtension();
                        if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                            $image = Image::make($file->getRealPath())
                                ->resize(null, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save(public_path('storage/upload/routes/'.$file_inventory_before));

                        }else{
                            Storage::putFileAs('public/upload/routes', $file, $file_inventory_before);
                        }
                        if ($eb) {
                            $eb->update([
                                'file_inventory_before' => $file_inventory_before,
                            ]);
                        }
                    }
                }
                if ($request->file_inventory_then[$k]) {
                    if ($request->hasFile('file_inventory_then')) {
                        $file = $request->file('file_inventory_then')[$k];
                        $file_inventory_then = time().str_random().'.'.$file->getClientOriginalExtension();
                        if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                            $image = Image::make($file->getRealPath())
                                ->resize(null, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save(public_path('storage/upload/routes/'.$file_inventory_then));

                        }else{
                            Storage::putFileAs('public/upload/routes', $file, $file_inventory_then);
                        }
                        if ($eb) {
                            $eb->update([
                                'file_inventory_then' => $file_inventory_then,
                            ]);
                        }
                    }
                }
                if ($request->file_marcked[$k]) {
                    if ($request->hasFile('file_marcked')) {
                        $file = $request->file('file_marcked')[$k];
                        $file_marcked = time().str_random().'.'.$file->getClientOriginalExtension();
                        if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                            $image = Image::make($file->getRealPath())
                                ->resize(null, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save(public_path('storage/upload/routes/'.$file_marcked));

                        }else{
                            Storage::putFileAs('public/upload/routes', $file, $file_marcked);
                        }
                        if ($eb) {
                            $eb->update([
                                'file_marcked' => $file_marcked,
                            ]);
                        }
                    }
                }
                
                if ($eb) {
                    $eb->update([
                        'name_eb' => $request->name_eb[$k],
                        'chs_observation' => $request->chs_observation[$k],
                        'require_window' => $request->require_window[$k],
                        'status' => 1
                    ]);
                }else {
                    $eb = routeBaseStation::create([
                        'service_id' => $sv->id,
                        'num' => $j,
                        'name_eb' => $request->name_eb[$k],
                        'file_material' => $file_material,
                        'file_equipment_room' => $file_equipment_room,
                        'file_cabling' => $file_cabling,
                        'file_inventory_before' => $file_inventory_before,
                        'file_inventory_then' => $file_inventory_then,
                        'file_marcked' => $file_marcked,
                        'chs_observation' => $request->chs_observation[$k],
                        'require_window' => $request->require_window[$k],
                        'status' => 1
                    ]);
                }
                for ($l=0; $l < 3; $l++) {
                    $type = routeBaseStationType::where('eb_id', $eb->id)->where('type',$request->type[$m])->update([
                        'nemonico' => $request->nemonico[$m],
                        'reference' => $request->reference[$m],
                        'slot' => $request->slot[$m],
                        'port' => $request->port[$m]
                    ]);
                    if (!$type) {
                        routeBaseStationType::create([
                            'eb_id' => $eb->id,
                            'type' => $request->type[$m],
                            'nemonico' => $request->nemonico[$m],
                            'reference' => $request->reference[$m],
                            'slot' => $request->slot[$m],
                            'port' => $request->port[$m]
                        ]);
                    }
                    $m++;
                }
                $k++;
            }
        }
        if ($request->send == 'Firmar') {
            $users = User::where('state',1)->get();
            foreach ($users as $user) {
                if ($user->hasPermissionTo('Aprobar proyectos de rutas')) {
                    $user->notify(new notificationMain($id->id,'Proyecto de rutas por aprobar '.$id->id,'project/routes/show/'));
                }
            }
        }else {
            $id->responsable->notify(new notificationMain($id->id,'Proyecto de rutas editado '.$id->id,'project/routes/show/'));
            foreach ($id->users as $user) {
                if ($id->responsable->id != $user->id) {
                    $user->notify(new notificationMain($id->id,'Proyecto de rutas editado '.$id->id,'project/routes/show/'));
                }
            }
        }

        return redirect()->route('routes')->with('success','Se ha actualizado el proyecto correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Routes $id)
    {
        $id->delete();
        return redirect()->route('routes')->with('success','Se ha eliminado el proyecto correctamente');
    }

    public function approval(Routes $id)
    {
        $id->update(['status' => 1]);
        $id->responsable->notify(new notificationMain($id->id,'Proyecto de rutas aprobado '.$id->id,'project/routes/show/'));
        return redirect()->route('approval')->with(['success'=>'Se ha aprobado el proyecto correctamente','sudmenu' => 15]);
    }
    public function not_approval(Routes $id)
    {
        $id->update(['status' => 2]);
        $id->responsable->notify(new notificationMain($id->id,'Proyecto de rutas desaprobado '.$id->id,'project/routes/show/'));
        return redirect()->route('approval')->with(['success'=>'Se ha desaprobado el proyecto correctamente','sudmenu' => 15]);
    }
}