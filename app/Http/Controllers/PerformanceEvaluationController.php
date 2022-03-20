<?php

namespace App\Http\Controllers;

use App\Models\PerformanceEvaluation;
use App\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use App\Notifications\notificationMain;

class PerformanceEvaluationController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de evaluaciones de desempeño|Ver evaluaciones de desempeño|Evaluar evaluaciones de desempeño|Calificar evaluaciones de desempeño|Aprobar evaluación de desempeño',['only' => ['index']]);
        $this->middleware('permission:Ver evaluaciones de desempeño',['only' => ['show']]);
        $this->middleware('permission:Evaluar evaluaciones de desempeño',['only' => ['autoevaluation','self_assessment_store']]);
        $this->middleware('permission:Calificar evaluaciones de desempeño',['only' => ['responder','store']]);
        $this->middleware('permission:Aprobar evaluación de desempeño',['only' => ['approve_performance','not_approve_performance']]);
        $this->middleware('permission:Descargar evaluación de desempeño',['only' => ['approve_performance','not_approve_performance']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasPermissionTo('Lista de evaluaciones de desempeño') || auth()->user()->hasPermissionTo('Ver evaluaciones de desempeño')){
            $performances = PerformanceEvaluation::get();
        }else {
            $performances = PerformanceEvaluation::where('user_id',auth()->id())->get();
        }
        return view('performance_evaluation.index',compact('performances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::with('position')->where('state',1)->get();
        
        foreach ($users as $user) {
            if ($user->position && $user->id != 1) {
                $id = PerformanceEvaluation::create([
                    'evaluator_id' => auth()->id(),
                    'user_id' => $user->id,
                    'state'=>'Sin leer',
                    'type_evaluation_id' => $user->position->type_evaluation,
                ]);

                $user->notify(new notificationMain($id->id,'Nueva evaluación de desempeño '.$id->id,'performance_evaluation/'));
    
                Mail::send('emails.performance_evaluation', ['id' => $id->id], function ($menssage) use ($user)
                {
                    $menssage->to($user->email,$user->name)->subject("Energitelco S.A.S. nueva evaluación de desempeño.");
                });
            }
        }

        return redirect()->route('performance_evaluation')->with('success','Se ha solicitado la autoevaluación a todos los usuarios correctamente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PerformanceEvaluation $id)
    {
        if ($id->state == 'Sin calificar' && (auth()->id() == $id->responsable->id || auth()->user()->hasRole('Administrador'))){
            $request->validate([
                'item_1_new' => ['required','integer'],
                'item_2_new' => ['required','integer'],
                'item_3_new' => ['required','integer'],
                'item_4_new' => ['required','integer'],
                'item_5_new' => ['required','integer'],
                'item_6_new' => ['required','integer'],
                'item_7_new' => ['required','integer'],
                'item_8_new' => ['required','integer'],
                'item_9_new' => ['required','integer'],
                'item_10_new' => ['required','integer'],
                'item_11_new' => ['required','integer'],
                'item_12_new' => ['required','integer'],
                'item_13_new' => ['required','integer'],
                'item_14_new' => [($id->type_evaluation_id == 3 || $id->type_evaluation_id == 2) ? 'required' : '','integer'],
                'item_15_new' => [($id->type_evaluation_id == 2) ? 'required' : '','integer'],
                'training_needs' => ['required'],
                'activty' => ['required'],
                'event' => ['required'],
                'aspects' => ['required'],
            ]);
            $id->update([
                'item_1_new' => $request->item_1_new,
                'item_2_new' => $request->item_2_new,
                'item_3_new' => $request->item_3_new,
                'item_4_new' => $request->item_4_new,
                'item_5_new' => $request->item_5_new,
                'item_6_new' => $request->item_6_new,
                'item_7_new' => $request->item_7_new,
                'item_8_new' => $request->item_8_new,
                'item_9_new' => $request->item_9_new,
                'item_10_new' => $request->item_10_new,
                'item_11_new' => $request->item_11_new,
                'item_12_new' => $request->item_12_new,
                'item_13_new' => $request->item_13_new,
                'item_14_new' => $request->item_14_new,
                'item_15_new' => $request->item_15_new,
                'training_needs' => $request->training_needs,
                'activty' => $request->activty,
                'event' => $request->event,
                'aspects' => $request->aspects,
                'total' => $request->average,
                'state' => 'Sin aprobar',
            ]);

            $id->evaluado->notify(new notificationMain($id->id,'Evaluación de desempeño calificada '.$id->id,'performance_evaluation/show/'));

            //Mail

            return redirect()->route('performance_evaluation')->with('success','Se ha realizado la calificación de la evaluación de desempeño correctamente');
        }
        return redirect()->route('home')->with('success','No tienes acceso a esta página.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PerformanceEvaluation $id)
    {
        return view('performance_evaluation.show',compact('id'));
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
    public function update(Request $request, PerformanceEvaluation $id)
    {
        if ($id->state == 'Sin leer' && auth()->id() == $id->evaluado->id){
            $request->validate([
                'date' => ['required'],
                'period' => ['required'],
                'item_1' => ['required','integer'],
                'item_2' => ['required','integer'],
                'item_3' => ['required','integer'],
                'item_4' => ['required','integer'],
                'item_5' => ['required','integer'],
                'item_6' => ['required','integer'],
                'item_7' => ['required','integer'],
                'item_8' => ['required','integer'],
                'item_9' => ['required','integer'],
                'item_10' => ['required','integer'],
                'item_11' => ['required','integer'],
                'item_12' => ['required','integer'],
                'item_13' => ['required','integer'],
                'item_14' => [($id->type_evaluation_id == 3 || $id->type_evaluation_id == 2) ? 'required' : '','integer'],
                'item_15' => [($id->type_evaluation_id == 2) ? 'required' : '','integer'],
            ]);

            $id->update([
                'date' => $request->date,
                'period' =>$request->period,
                'item_1' => $request->item_1,
                'item_2' => $request->item_2,
                'item_3' => $request->item_3,
                'item_4' => $request->item_4,
                'item_5' => $request->item_5,
                'item_6' => $request->item_6,
                'item_7' => $request->item_7,
                'item_8' => $request->item_8,
                'item_9' => $request->item_9,
                'item_10' => $request->item_10,
                'item_11' => $request->item_11,
                'item_12' => $request->item_12,
                'item_13' => $request->item_13,
                'item_14' => $request->item_14,
                'item_15' => $request->item_15,
                'total_1' => $request->average,
                'state' => 'Sin calificar',
            ]);

            $id->responsable->notify(new notificationMain($id->id,'Evaluación de desempeño sin calificar '.$id->id,'performance_evaluation/show/'));

            // Notificar
            
            return redirect()->route('performance_evaluation')->with('success','Se ha enviado la correctamente su evaluación');
        }
        return redirect()->route('home')->with('success','No tienes acceso a esta página.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerformanceEvaluation $id)
    {
        $id->delete();
        return redirect()->back()->with(['success'=>'Se ha eliminado la evaluación de desempeño correctamente']);
    }

    public function autoevaluation(PerformanceEvaluation $id)
    {
        if ($id->state == 'Sin leer' && auth()->id() == $id->evaluado->id){
            return view('performance_evaluation.autoevaluation',compact('id'));
        }
        return redirect()->route('home')->with('success','No tienes acceso a esta página.');
    }

    public function responder(PerformanceEvaluation $id)
    {
        if ($id->state == 'Sin calificar' && (auth()->id() == $id->responsable->id || auth()->user()->hasRole('Administrador'))){
            return view('performance_evaluation.responder',compact('id'));
        }
        return redirect()->route('home')->with('success','No tienes acceso a esta página.');
    }

    public function approve_performance(PerformanceEvaluation $id)
    {
        $id->update(['state'=>'Aprobado','approver_id' => auth()->id()]);

        $id->evaluado->notify(new notificationMain($id->id,'Evaluación de desempeño aprobada '.$id->id,'performance_evaluation/show/'));
        //Mail
        return redirect()->back()->with(['success'=>'Se ha aprobado la evaluación de desempeño correctamente']);
    }
    
    public function not_approve_performance(PerformanceEvaluation $id)
    {
        $id->update(['state'=>'No aprobado','approve_id' => auth()->id()]);
        //Mail
        $id->evaluado->notify(new notificationMain($id->id,'Evaluación de desempeño desaprobada '.$id->id,'performance_evaluation/show/'));

        return redirect()->back()->with(['success'=>'Se ha desaprobado la evaluación de desempeño correctamente']);
    }

    public function download($id)
    {
        $id = PerformanceEvaluation::with(['responsable','evaluado'])->find($id);
        
        $pdf = PDF::loadView('performance_evaluation/pdf/main',['id' => $id]);
         $codigo = ($id->type_evaluation_id == 1) ? 'H-FR-04' : (($id->type_evaluation_id == 2) ? 'H-FR-05' : 'H-FR-05');
        return $pdf->download($codigo.'-'.$id->id.'_EVALUACION_DESEMPENO.pdf');
    }
}
