<?php

namespace App\Http\Controllers\inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\invComputer;
use App\Notifications\notificationMain;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class computerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de computadores del inventario|Crear computadores al inventario|Ver computadores del inventario|Editar computadores del inventario|Eliminar computadores del inventario',['only' => ['index']]);
        $this->middleware('permission:Crear computadores al inventario',['only' => ['create','store']]);
        $this->middleware('permission:Ver computadores del inventario',['only' => ['show']]);
        $this->middleware('permission:Editar computadores del inventario',['only' => ['edit','update']]);
        $this->middleware('permission:Eliminar computadores del inventario',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computers = invComputer::where('status','!=',0)->get();
        return view('inventory.computer.index',compact('computers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('state',1)->get();
        return view('inventory.computer.create',compact('users'));
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
            'brand' => ['required'],
            'serial' => ['required'],
            'model' => ['required'],
            'cpu' => ['required'],
            'rom' => ['required'],
            'ram' => ['required'],
            'so' => ['required'],
            'software' => ['required'],
            'license' => ['required'],
            'graphic_card' => ['required'],
            'warranty' => ['required'],
            'start_date' => ['required'],
            'site' => ['required'],
            'type' => ['required'],
            'status' => ['required'],
            'avatars' => ['required'],
            'office' => ['required'],
            'antivirus' => ['required'],
            'elemets' => ['required'],
            'ports' => ['required'],
            'tecnology' => ['required'],
            'wireless_connectivity' => ['required'],
        ]);

        if($request->hasFile('avatars')){
            $file = $request->file('avatars');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/computer', $file, $name);
            $request['avatar'] = $name;
        }
        $computer = invComputer::create($request->all());

        $users = User::where('state',1)->get();
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de computadores del inventario')) {
                $user->notify(new notificationMain($computer->id,'Nuevo computador registrado '.$computer->id,'invetory/computer/show/'));
            }
        }

        return redirect()->route('inv_computer')->with('success','Se ha creado el computador correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = invComputer::with('user')->find($id);
        return view('inventory.computer.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(invComputer $id)
    {
        $users = User::where('state',1)->get();
        return view('inventory.computer.edit',compact('id','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invComputer $id)
    {
        $request->validate([
            'brand' => ['required'],
            'serial' => ['required'],
            'model' => ['required'],
            'cpu' => ['required'],
            'rom' => ['required'],
            'ram' => ['required'],
            'so' => ['required'],
            'software' => ['required'],
            'license' => ['required'],
            'graphic_card' => ['required'],
            'warranty' => ['required'],
            'start_date' => ['required'],
            'site' => ['required'],
            'type' => ['required'],
            'status' => ['required'],
            'office' => ['required'],
            'antivirus' => ['required'],
            'elemets' => ['required'],
            'ports' => ['required'],
            'tecnology' => ['required'],
            'wireless_connectivity' => ['required'],
        ]);

        if($request->hasFile('avatars')){
            $file = $request->file('avatars');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/computer', $file, $name);
            $request['avatar'] = $name;
        }
        $id->update($request->all());

        $users = User::where('state',1)->get();
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de computadores del inventario')) {
                $user->notify(new notificationMain($id->id,'Un computador del inventario fue editado '.$id->id,'invetory/computer/show/'));
            }
        }

        return redirect()->route('inv_computer')->with('success','Se ha editado el computador correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(invComputer $id)
    {
        $id->update(['status' => 0]);
        return redirect()->route('inv_computer')->with('success','Se ha eliminado el computador correctamente');
    }
}
