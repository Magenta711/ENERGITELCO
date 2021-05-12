<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;
use App\Models\document;
use App\Models\Register;
use App\Notifications\notificationMain;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    
    public function index()
    {
        $documents = document::where('status','!=',3)->where('contract',1)->get();
        return view('profile.index',compact('documents'));
    }

    public function edit()
    {
        return view('settings.personal_information');
    }

    public function password_edit()
    {
        return view('settings.password_reset');
    }

    public function update(Request $request)
    {
        //pinture profile
        $this->authorize(auth()->user());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth()->id()],
            'cedula' => ['required','unique:users,cedula,'.auth()->id()],
            'direccion' => ['required'],
            'telefono' => ['required'],
        ]);
        $name = auth()->user()->foto;
        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/img/',$name);
            User::find(auth()->id())->update(['foto'=>$name,]);
        }
        
        if($request->email !== auth()->user()->email){
            auth()->user()->update([ 'email_verified_at' => null ]);
        }

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'cedula' => $request->cedula,
            'area' => $request->area,
        ]);

        if (auth()->user()->register) {
            auth()->user()->register->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->direccion,
                'tel' => $request->telefono,
                'document' => $request->cedula,
            ]);
        }
        
        return redirect()->route('profile')->with('success','Su usuarios ha sido actualizado correctamente');
    }
    
    public function password_update(Request $request)
    {
        $request->validate([
            'current_password' => ['required','string'],
            'password' => ['required', 'string', 'min:8','confirmed'],
        ]);

        if (Hash::check($request->current_password,auth()->user()->password)) {
            auth()->user()->update([
                'password'=>bcrypt($request->password),
            ]);
        }else {
            return redirect()->back()->withErrors(['current_password' => 'Contraseña incorrecta']);
        }

        // Notificar

        return redirect()->back()->withSuccess('Su contraseña ha sido actualizada correctamente');
    }

    public function add_information()
    {
        return view('settings.add_information');
    }

    public function add_information_update (Request $request)
    {
         $request->validate([
            'age' => ['required'],
            'marital_status' => ['required'],
        ]);

        $request['document'] = auth()->user()->cedula;
        $request['email'] = auth()->user()->email;
        $request['address'] = auth()->user()->direccion;
        $request['name'] = auth()->user()->name;
        $request['position_id'] = auth()->user()->position_id;
        $request['photo'] = auth()->user()->foto;
        $request['tel'] = auth()->user()->telefono;

        if (auth()->user()->register) {
            auth()->user()->register->update($request->all());
        }else {
            $register = Register::create($request->all());
            auth()->user()->update(['register_id' => $register->id]);
        }

        $users = User::where('state',1)->get();
        
        foreach ($users as $user) {
            if ($user->hasRole('Administrador')) {
                $user->notify(new notificationMain(auth()->id(),'El funcionario '.auth()->user()->name.' actualizó su perfil','users/show/'));
            }
        }
        
        return redirect()->route('profile')->with('success','Su usuario se ha actualizado correctamente');
    }

    public function carnet(){
        return view('profile.carnet');
    }
}
