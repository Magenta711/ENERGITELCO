<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\attention_call\AttentionCall;
use App\Models\general_setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Positions;
use App\Models\system_setting;
use App\Models\Register;
use App\User;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\notificationMain;
use Illuminate\Support\Facades\Storage;
use App\Models\document;
use App\Models\file;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de usuarios|Crear usuarios|Editar usuarios|Eliminar usuarios|Ver usuarios|Realizar llamados de atención a trabajadores', ['only' => ['index']]);
        $this->middleware('permission:Crear usuarios', ['only' => ['create']]);
        $this->middleware('permission:Editar usuarios', ['only' => ['edit','update']]);
        $this->middleware('permission:Eliminar usuarios', ['only' => ['destroy']]);
        $this->middleware('permission:Ver usuarios', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $positions = Positions::where('state',1)->orderBy('name')->get();
        return view('users.create',compact('roles','positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $update_user = user::where('email',$request->email)->where('state',0)->first();
        if ($update_user){
            $request->validate([
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string', 'min:8'],
                'direccion' => ['required'],
                'roles' => ['required'],
                'telefono' => ['required'],
                'position_id' => ['required'],
                'area' => ['required'],
                'cedula' => ['required'],
            ]);
            $update_user->update($request->all());
            $update_user->update([
                'state' => 1,
                'password' => bcrypt($request->password),
            ]);
            $usuario = $update_user();
            Mail::send('emails.store_user', ['request'=>$request], function ($menssage) use ($request)
            {
                $menssage->to($request->email,$request->name)->subject("Bienvenido al sistema de energitelco");
            });
            return redirect()->route('users')->with('success','Usuario creado corectamente.');
        }else {
            $request->validate([
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8'],
                'direccion' => ['required'],
                'roles' => ['required'],
                'telefono' => ['required'],
                'position_id' => ['required'],
                'area' => ['required'],
                'cedula' => ['required','unique:users,cedula'],
            ]);
                
            $usuario=User::create($request->all());
            
            $usuario->update([
                'state' => 1,
                'password' => bcrypt($request->password),
            ]);
    
            $usuario->assignRole($request->roles);
        }

        // Notification
        $users = User::where('state',1)->get();
        
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de usuarios')) {
                $user->notify(new notificationMain($usuario->id,'Nuevo usuario '.$usuario->id,'users/show/'));
            }
        }

        Mail::send('emails.store_user', ['request'=>$request], function ($menssage) use ($request)
        {
            $menssage->to($request->email,$request->name)->subject("Bienvenido al sistema de energitelco");
        });

        return redirect()->route('users')->with('success','Usuario creado corectamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $id)
    {
        $documents = document::where('status','!=',3)->where('contract',1)->get();
        return view('users.show',compact('id','documents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $id)
    {
        if($id->state == 0){
            return redirect()->route('users');
        }
        $positions = Positions::where('state',1)->orderBy('name')->get();
        $roles = Role::get();
        $contract = $id->register ? $id->register->hasContract() : false;
        return view('users.edit',compact('id','roles','positions','contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id->id],
            'roles' => ['required'],
            'cedula' => ['required','unique:users,cedula,'.$id->id],
            'direccion' => ['required'],
            'telefono' => ['required'],
            'position_id' => ['required'],
            'area' => ['required'],
        ]);
        $request["address"] = $request->direccion;
        $request["tel"] = $request->telefono;
        $request["document"] = $request->cedula;
        if($request->email !== $id->email){
            $id->update([ 'email_verified_at' => null ]);
        }
        if ($request->password) {
            $request['password'] = bcrypt($request->password);
        }else {
            $request['password'] = $id->password;
        }

        if ($request->hasFile('file_signature')){
            $fileSig = $request->file('file_signature');
            $nameSig = time().str_random().'.'.$fileSig->getClientOriginalExtension();
            $fileResult = Storage::put('public/signature/', $fileSig, 'public');
            $request['signature'] = explode('/',$fileResult)[count(explode('/',$fileResult)) - 1];
        }

        $id->update($request->all());
        DB::table('model_has_roles')->where('model_id',$id->id)->delete();
        
        $id->assignRole($request->roles);
        
        if ($id->register)
        {
            $id->register->update($request->all());
            $register = $id->register;
        }else
        {
            $register = Register::create($request->all());
            $id->update(['register_id' => $register->id]);
        }
        $mensaje = '';
        if (auth()->user()->hasPermissionTo('Editar contrato'))
        {
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $day = date('d', strtotime($request->date));
            $month = date('n', strtotime($request->date));
            $year = date('Y', strtotime($request->date));

            $time = time();
            // Convertir fecha
            $date = ['day' => $day,'month' => $meses[($month -1)],'year' => $year];
            $end_date = null;
            if ($request->months)
            {
                $end_date = Carbon::create($request->date)->addMonth($request->months);
            }
            if ($request->hasFile('contract_file'))
            {
                $file = $request->file('contract_file');
                $path = Storage::putFileAs('public/contratos/', $file, $time.'contrato.pdf');
                $size = $file->getClientSize() / 1000;
                Contract::where('register_id',$register->id)->where(function (Builder $query) {
                    return $query->where('status',1)->orWhere('status',2);
                })->update([
                    'status' => 0,
                    'last_date' => $request->date
                ]);
                $status = $id->register->curriculum == 'Completo' || $id->curriculum == 'Pendiente' ? 1 : 2;
                $contract = Contract::create([
                    'register_id' => $id->register->id,
                    'type_contract' => $request->type_contract,
                    'start_date' => $request->date,
                    'end_date' => $end_date,
                    'day_breack' => $request->day_breack,
                    'months' => $request->months,
                    'salary' => $request->salary,
                    'isAuto' => 0,
                    'renovation' => 1,
                    'status' => $status,
                ]);
        
                $contract->file()->create([
                    'name' => $time.'contrato.pdf',
                    'description' => 'Contracto '.$id->register->name,
                    'size' => $size.' KB',
                    'type' => $file->getClientOriginalExtension(),
                    'url' => $path,
                    'state' => 1,
                ]);
                $mensaje = ' junto con el contracto';
            }else 
            {
                if(!$register->hasContract() || ($register->hasContract() && ($register->hasContract()->type_contract != $request->type_contract || $register->hasContract()->start_date != $request->date || $register->hasContract()->day_breack != $request->day_breack || $register->hasContract()->months != $request->months || $register->hasContract()->salary != $request->salary)))
                {
                    if ($request->date && $request->day_breack && $request->salary && $request->type_contract && $request->nationality)
                    {
                        $request["date_birth"] = date('d-m-Y', strtotime($request->date_birth));
                        $pdf = PDF::loadView('documents/contract',['data'=>$request,'id' => $register, 'date' => $date]);
                        $pdf->save(storage_path('app/public/contratos/') .$time.'contrato.pdf');

                        Contract::where('register_id',$register->id)->where('status',1)->update([
                            'status' => 0,
                            'end_date' => $request->date
                        ]);
                        $contract = Contract::create([
                            'register_id' => $id->register->id,
                            'type_contract' => $request->type_contract,
                            'start_date' => $request->date,
                            'end_date' => $end_date,
                            'day_breack' => $request->day_breack,
                            'months' => $request->months,
                            'salary' => $request->salary,
                            'isAuto' => 1,
                            'renovation' => 1,
                            'status' => 1,
                        ]);
                        $contract->file()->create([
                            'name' => $time.'contrato.pdf',
                            'description' => 'Contracto '.$id->register->name,
                            'size' => '103 KB',
                            'type' => 'pdf',
                            'url' => 'public/contratos',
                            'state' => 1,
                        ]);
                        $mensaje = ' junto con el contracto';
                    }
                }
            }
        }
        // Notification
        $users = User::where('state',1)->get();
        
        foreach ($users as $user)
        {
            if ($user->hasPermissionTo('Editar usuarios'))
            {
                $user->notify(new notificationMain($id->id,'Usuario actualizado '.$id->id.$mensaje,'users/show/'));
            }
        }
        
        return redirect()->route('users')->with('success','Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $id)
    {
        $id->update(['state'=>0]);
        // return redirect()->route('users')->with('success','Usuario eliminado correctamente');
        return response()->json( $id );
    }

    //Restauar
    public function restore(User $id)
    {
        $id->update(['state'=>1,]);
        if ($id->register) {
            $id->register->update([
                'state' => 1
            ]);
        }
        return redirect()->route('users')->with('success','Usuario restaurado correctamente');
    }

    public function export() 
    {
        $id = User::where('state',1)->get();
        return (new UsersExport)->actives($id)->download(time().'_users.xlsx');
    }

    public function list()
    {
        $users = User::where('state',1)->with(['position','register'])->get();
        return response()->json(['data' => $users]);
    }
}
