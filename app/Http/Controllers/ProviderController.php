<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\TypeProvider;
use App\Notifications\notificationMain;
use App\User;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de proveedores|Crear proveedores|Ver proveedores|Eliminar proveedores|Editar proveedores',['only' => ['index']]);
        $this->middleware('permission:Editar proveedores',['only' => ['edit','update']]);
        $this->middleware('permission:Crear proveedores',['only' => ['ceate','store']]);
        $this->middleware('permission:Eliminar proveedores',['only' => ['destroy']]);
        $this->middleware('permission:Ver proveedores',['only' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::with('type_provider')->where('state',1)->get();
        return view('providers.index',compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_providers = TypeProvider::get();
        return view('providers.create',compact('type_providers'));
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
            'nit' => ['required','string','unique:providers,nit'],
            'name' => ['required','string'],
            'email' => ['required','string','email','unique:providers,email'],
            'address' => ['required','string','unique:providers,address'],
            'tel' => ['required'],
            'city' => ['required'],
            'type_id' => ['required'],
        ]);

        $provider = Provider::create($request->all());

        $users = User::where('state',1)->get();
        
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de proveedores')) {
                $user->notify(new notificationMain($provider->id,'Nuevo proveedor '.$provider->id,'providers/show/'));
            }
        }

        return redirect()->route('providers')->with('success','Se ha creado un proveedor correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $id)
    {
        return view('providers.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $id)
    {
        $type_providers = TypeProvider::get();
        return view('providers.edit',compact('id','type_providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $id)
    {
        $request->validate([
            'nit' => ['required','string','unique:providers,nit,'.$id->id],
            'name' => ['required','string'],
            'email' => ['required','string','email','unique:providers,email,'.$id->id],
            'address' => ['required','string','unique:providers,address,'.$id->id],
            'tel' => ['required'],
            'city' => ['required'],
            'type_id' => ['required'],
        ]);

        $id->update($request->all());

        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de proveedores')) {
                $user->notify(new notificationMain($id->id,'El proveedor '.$id->name.' se ha editado','providers/show/'));
            }
        }

        return redirect()->route('providers')->with('success','Se ha actualizado un proveedor correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $id)
    {
        $id->update(['state'=>0]);
        return redirect()->route('providers')->with('success','El proveedor fue eliminado correctamente');
    }
}
