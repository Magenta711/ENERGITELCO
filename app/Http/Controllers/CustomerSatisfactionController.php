<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerSatisfaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Notifications\notificationMain;

class CustomerSatisfactionController extends Controller
{
    public function __construct() {
        $this->middleware('permission:Lista de evaluaciones de satisfacción del cliente|Ver evaluación de satisfacción del cliente',['only' => ['index']]);
        $this->middleware('permission:Ver evaluaciones de satisfacción de los clientes',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satisfactions = CustomerSatisfaction::with('customer')->get();
        return view('customer_satisfaction.index',compact('satisfactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($token, $id)
    {
        $customer_satisfaction = CustomerSatisfaction::with('customer')->where('token',$token)->where('state',1)->first();
        if ($customer_satisfaction){
            return view('customer_satisfaction.create',compact('customer_satisfaction'));
        }
        return redirect()->route('customer_satisfaction_success')->with('title','Ya respondiste')->with('success','Solo puedes llenar este formulario una vez., Gracias por su colaboración. Si consideras que se trata de un error, intenta comunicarte con Energitelco S.A.S')->with('slogan','Nuestro mejor premio es la satisfación de nuestros clientes.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,CustomerSatisfaction $id)
    {
        $request->validate([
            'name_company' => ['required'],
            'official' => ['required'],
            'position_official' => ['required'],
            'dependence' => ['required'],
            'date' => ['required'],
            'period' => ['required'],
        ]);

        if($id->state == 1){
            $id->update($request->all());
            $id->update(['state'=>0]);
            //mail
            $id->user->notify(new notificationMain($id->id,$id->customer->name.' ha contestado la evaluación de satisfacción del cliente','customers/show/'));
    
            return redirect()->route('customer_satisfaction_success')->with('title','Gracias por su colaboración.')->with('success','Su opinión es fundamental para el proceso de mejoramiento continuo de nuestra empresa.  Por ello, le solicitamos nos colabore diligenciando el siguiente cuestionario, el cual nos permitirá conocer la situación real en la prestación de los servicios de nuestra empresa.')->with('slogan','Nuestro mejor premio es la satisfación de nuestros clientes.');
        }
        return redirect()->route('customer_satisfaction_success')->with('title','Ya respondiste')->with('success','Solo puedes llenar este formulario una vez. Gracias por su colaboración. Si consideras que se trata de un error, intenta comunicarte con Energitelco S.A.S')->with('slogan','Nuestro mejor premio es la satisfación de nuestros clientes.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = CustomerSatisfaction::with('customer')->find($id);
        return view('customer_satisfaction.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerSatisfaction $id)
    {
        $id->delete();
        return redirect()->route('customers')->with('success','Se ha eliminado la evaluación de satisfación del cliente correctamente');
    }

    public function new_evaluation(Request $request, Customer $id)
    {
        $token = Str::random(60);
        CustomerSatisfaction::create([
            'user_id' => auth()->id(),
            'customer_id' => $id->id,
            'token' => $token,
            'state' => 1
        ]);

        //mail
        Mail::send('emails.customer_satisfaction', ['token' => $token, 'id' => $id->id], function ($menssage) use ($id)
        {
            $menssage->to($id->email,$id->name)->subject("Energitelco S.A.S. evaluación de satisfación del cliente.");
        });

        return redirect()->route('customers')->with('success','Se ha enviado la evaluación de satisfación del cliente correctamente a '.$id->name);
    }

    public function success()
    {
        return view('customer_satisfaction.success');
    }
}
