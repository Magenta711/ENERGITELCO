<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Notifications\notificationMain;
use App\User;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de clientes|Crear clientes|Ver clientes|Eliminar clientes|Editar clientes',['only' => ['index']]);
        $this->middleware('permission:Editar clientes',['only' => ['edit','update']]);
        $this->middleware('permission:Crear clientes',['only' => ['ceate','store']]);
        $this->middleware('permission:Eliminar clientes',['only' => ['destroy']]);
        $this->middleware('permission:Ver clientes',['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::where('state','1')->get();
        
        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'nit' => ['required','string','unique:customers,nit'],
            'name' => ['required','string'],
            'email' => ['required','string','email','unique:customers,email'],
            'address' => ['required','string','unique:customers,address'],
            'tel' => ['required'],
            'city' => ['required'],
        ]);
        
        $customer = Customer::create($request->all());
        
        $users = User::where('state',1)->get();
        
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de clientes')){
                $user->notify(new notificationMain($customer->id,'Nuevo cliente '.$customer->id,'customers/show/'));
            }
        }

        return redirect()->route('customers')->with('success','Se ha creado un cliente correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $id)
    {
        return view('customers.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $id)
    {
        return view('customers.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $id)
    {
        $request->validate([
            'nit' => ['required','string','unique:customers,nit,'.$id->id],
            'name' => ['required','string'],
            'email' => ['required','string','email','unique:customers,email,'.$id->id],
            'address' => ['required','string','unique:customers,address,'.$id->id],
            'tel' => ['required'],
            'city' => ['required'],
        ]);

        $id->update($request->all());

        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de clientes')){
                $user->notify(new notificationMain($id->id,'Cliente '.$id->name.' actualizado','customers/show/'));
            }
        }

        return redirect()->route('customers')->with('success','Se ha actualizado un cliente correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $id)
    {
        $id->update(['state'=>0]);
        return redirect()->route('customers')->with('success','El cliente fue eliminado correctamente');
    }
}
