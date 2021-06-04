<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;
use App\Models\document;
use App\Models\Register;
use App\Notifications\notificationMain;
use Carbon\Carbon;
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
            'direccion' => ['required'],
            'telefono' => ['required'],
            'marital_status' => ['required'],
            'emergency_contact' => ['required'],
            'emergency_contact_number' => ['required'],
            'shirt_size' => ['required'],
            'pant_size' => ['required'],
            'shoe_size' => ['required'],
            'height' => ['required'],
            'weight' => ['required'],
        ]);
        $name = auth()->user()->foto;
        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/img/',$name);
            User::find(auth()->id())->update(['foto'=>$name,]);
        }
        $last_24_7 = null;
        $menssage = '';
        if (!auth()->user()->b24_7 && isset($request->b24_7)) {
            $last_24_7 = now();
        }
        if (auth()->user()->b24_7) {
            if (!$request->b24_7) {
                $menssage = '<br>No puedes desabilitar el 24/7 hasta que cumpla con el tiempo de 7 días';
                if (now()->subDays(7) < auth()->user()->last_24_7) {
                    $request['b24_7'] = 1;
                    $last_24_7 = auth()->user()->last_24_7;
                }else {
                    $request['b24_7'] = 0;
                    $last_24_7 = null;
                }
            }else {
                $last_24_7 = auth()->user()->last_24_7;
            }
        }

        auth()->user()->update([
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'b24_7' => $request->b24_7,
            'last_24_7' => $last_24_7,
        ]);

        if (auth()->user()->register) {
            auth()->user()->register->update([
                'address' => $request->direccion,
                'tel' => $request->telefono,
                'marital_status' => $request->marital_status,
                'emergency_contact' => $request->emergency_contact,
                'emergency_contact_number' => $request->emergency_contact_number,
                'shirt_size' => $request->shirt_size,
                'pant_size' => $request->pant_size,
                'shoe_size' => $request->shoe_size,
                'height' => $request->height,
                'weight' => $request->weight,
            ]);
        }
        
        return redirect()->route('profile')->with('success','Su usuarios ha sido actualizado correctamente'.$menssage);
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

    public function all_week()
    {
        auth()->user()->update([
            'b24_7' => 1,
            'last_24_7' => now(),
        ]);

        return response()->json(['success'=>'Good']);
    }
}
