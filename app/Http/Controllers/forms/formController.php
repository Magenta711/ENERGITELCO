<?php

namespace App\Http\Controllers\forms;

use App\Exports\AnswersExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\autoForm\form;
use App\Models\autoForm\order;
use App\Models\autoForm\Answer;
use App\Models\autoForm\question;
use App\Models\autoForm\detail_question;
use App\Models\Positions;
use Illuminate\Support\Str;
use App\Notifications\notificationMain;
use App\User;
// use App\Exports\AnswersExport;
// use Maatwebsite\Excel\Facades\Excel;

class formController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        // $this->middleware('permission:Ver lista de formularios', ['only' => ['index']]);
        // $this->middleware('permission:Ver formularios', ['only' => ['show']]);
        // $this->middleware('permission:Crear formularios', ['only' => ['create','store']]);
        // $this->middleware('permission:Editar formularios', ['only' => ['edit','update']]);
        // $this->middleware('permission:Eliminar formularios', ['only' => ['delete']]);
        // $this->middleware('permission:Ver todas las respuestas|Ver respuestas del cliente propias', ['only' => ['answer']]);
    }

    public function index()
    {
        $forms = form::orderBy('id','desc')->latest()->paginate(8);
        return view('forms.index',compact('forms'));
    }

    public function create ()
    {
        $positions = Positions::get();
        return view('forms.create',compact('positions'));
    }

    public function store(Request $request)
    {
        $acc_question = 0;
        $note = 0;
        if ($request->form_type == "Evaluación") {
            if ($request->rating_type == "Automática" && $request->type){
                if ($request->value_type == "Promedio") {
                    for ($i=0; $i < count($request->type); $i++) {
                        if ($request->type[$i] == 3) {
                            $acc_question++;
                        }
                    }
                }else {
                    for ($i=0; $i < count($request->type); $i++) {
                        if ($request->type[$i] == 3) {
                            $note+=$request->value_question;
                        }
                    }
                }
            }
        }
        $form = form::create([
            'name' => $request->name,
            'description' => $request->description,
            'responsible_id' => auth()->user()->id,
            'token' => Str::random(7),
            // setting
            'form_type' => $request->form_type,
            'rating_type' => $request->rating_type,
            'value_type' => $request->value_type,
            'from_to_guest' => $request->from_to_guest ? 1 : 0,
            'from_to_auth' => $request->from_to_auth ? 1 : 0,
            'from_to_mail' => $request->from_to_mail ? 1 : 0,
            'limit_to_one' => $request->limit_to_one ? 1 : 0,
            'sort_randomly' => $request->sort_randomly ? 1 : 0,
            'mails' => $request->mails,
            'note' => $request->form_type == "Evaluación" && $request->rating_type == "Automática" && $request->value_type == "Promedio" ? $request->note : $note,
        ]);
        $nO = 0;
        $nOtR = 0;
        $nOtC = 0;
        $nOtS = 0;
        $nF = 0;
        $nFt = 0;
        $note = $request->note / $acc_question;
        if($request->type){
            for ($i=0; $i < count($request->type); $i++) { 
                $required = 0;
                if (in_array(($i+1), $request->required)) {
                    $required = 1;
                }
                $question = question::create([
                    'form_id' => $form->id,
                    'question' => $request->question[$i],
                    'number' => $i,
                    'required' => $required,
                    'value_question' => $request->form_type == "Evaluación" && $request->rating_type == "Automática" && $request->value_type == "Promedio" ? $note : $request->value_question[$i],
                    'max_file' => $request->type[$i] == 6 ? $request->max_file[$i] : 0,
                    'description_question' => $request->description_question[$i],
                    'type' => $request->type[$i],
                    'status' => 1
                ]);
                switch ($request->type[$i]) {
                    case "3":
                        if ($request->num_option[$nO]){
                            for ($j=0; $j < $request->num_option[$nO]; $j++) {
                                detail_question::create([
                                    'question_id' => $question->id,
                                    'num' => $j,
                                    'option' => $request->text_radio[$nOtR],
                                    'type' => $request->type[$i]
                                ]);
                                $nOtR++;
                            }
                        }
                        $nO++;
                        break;
                    case "4":
                        if ($request->num_option[$nO]) {
                            for ($j=0; $j < $request->num_option[$nO]; $j++) {
                                detail_question::create([
                                    'question_id' => $question->id,
                                    'num' => $j,
                                    'option' => $request->text_checkbox[$nOtC],
                                    'type' => $request->type[$i]
                                ]);
                                $nOtC++;
                            }
                        }
                        $nO++;
                        break;
                    case "5":
                        if ($request->num_option[$nO]) {
                            for ($j=0; $j < $request->num_option[$nO]; $j++) { 
                                detail_question::create([
                                    'question_id' => $question->id,
                                    'num' => $j,
                                    'option' => $request->text_select[$nOtS],
                                    'type' => $request->type[$i]
                                ]);
                                $nOtS++;
                            }
                        }
                        $nO++;
                        break;
                    case "6":
                        if ($request->num_option_file[$nF]) {
                            for ($j=0; $j < $request->num_option_file[$nF]; $j++) { 
                                detail_question::create([
                                    'question_id' => $question->id,
                                    'num' => $j,
                                    'option' =>  $request->type_file[$nFt],
                                    'type' => $request->type[$i]
                                ]);
                                $nFt++;
                            }
                        }
                        $nF++;
                        break;
                    
                    default:
                        
                        break;
                }
            }
        }

        //position
        // if ($request->from_to_auth) {
        //     for ($i=0; $i < count($request->position); $i++) { 
                // $users = User::where('state',1)->where('position_id',$request->position[$i])->get();
                // foreach ($users as $item) {

                // }
        //     }
        // }

        $users = User::where('state',1)->get();
        foreach ($users as $use) {
            // if ($use->hasPermissionTo('Ver lista de formularios')) {
            //     $use->notify(new notificationMain($form->id,'Nuevo formulario '.$form->id,'forms/'.$form->id));
            // }
        }

        return redirect()->route('forms')->with('success','Se ha creado el formulario correctamente');
    }

    public function edit(form $id)
    {
        $positions = Positions::get();  
        return view('forms.edit',compact('id','positions'));
    }

    public function update(Request $request,form $id)
    {
        $acc_question = 0;
        $note = 0;
        if ($request->form_type == "Evaluación") {
            if ($request->rating_type == "Automática" && $request->type){
                if ($request->value_type == "Promedio") {
                    for ($i=0; $i < count($request->type); $i++) {
                        if ($request->type[$i] == 3) {
                            $acc_question++;
                        }
                    }
                }else {
                    for ($i=0; $i < count($request->type); $i++) {
                        if ($request->type[$i] == 3) {
                            $note+=$request->value_question;
                        }
                    }
                }
            }
        }
        $id->update([
            'name' => $request->name,
            'description' => $request->description,
            //setting
            'form_type' => $request->form_type,
            'rating_type' => $request->rating_type,
            'value_type' => $request->value_type,
            'from_to_guest' => $request->from_to_guest ? 1 : 0,
            'from_to_auth' => $request->from_to_auth ? 1 : 0,
            'from_to_mail' => $request->from_to_mail ? 1 : 0,
            'limit_to_one' => $request->limit_to_one ? 1 : 0,
            'sort_randomly' => $request->sort_randomly ? 1 : 0,
            'mails' => $request->mails,
            'note' => $request->form_type == "Evaluación" && $request->rating_type == "Automática" && $request->value_type == "Promedio" ? $request->note : $note,
        ]);
        question::where('form_id',$id->id)->update([ 'status' => 0 ]);
        $nO = 0;
        $nOtR = 0;
        $nOtC = 0;
        $nOtS = 0;
        $nF = 0;
        $nFt = 0;
        $note = $request->note / $acc_question;
        if($request->type){
            for ($i=0; $i < count($request->type); $i++) {
                $required = false;
                if (in_array(($i+1), $request->required)) {
                    $required = true;
                }
                if ($request->question_id[$i] == 0) {
                    $question = question::create([
                        'form_id' => $id->id,
                        'question' => $request->question[$i],
                        'number' => ($i + 1),
                        'required' => $required,
                        'answer' => isset($request->answer[($i + 1)]) ? $request->answer[($i + 1)] : null,
                        'type' => $request->type[$i],
                        'value_question' => $request->form_type == "Evaluación" && $request->rating_type == "Automática" && $request->value_type == "Promedio" ? $note : $request->value_question[$i],
                        'max_file' => $request->type[$i] == 6 ? $request->max_file[$i] : 0,
                        'description_question' => $request->description_question[$i],
                        'status' => 1
                    ]);
                }else {
                    $question = question::where('form_id',$id->id)->where('id',$request->question_id[$i])->first();
                    $change = 0;
                    if ($question->type == $request->type[$i]) {
                        $change = 1;
                    }
                    $question->update([
                        'question' => $request->question[$i],
                        'number' => ($i + 1),
                        'answer' => isset($request->answer[($i + 1)]) ? $request->answer[($i + 1)] : null,
                        'required' => $required,
                        'type' => $request->type[$i],
                        'value_question' => $request->form_type == "Evaluación" && $request->rating_type == "Automática" && $request->value_type == "Promedio" ? $note : $request->value_question[$i],
                        'max_file' => $request->type[$i] == 6 ? $request->max_file[$i] : 0,
                        'description_question' => $request->description_question[$i],
                        'status' => 1
                    ]);
                }
                switch ($request->type[$i]) {
                    case "3":
                        if ($request->num_option[$nO]){
                            if ($change == 0) {
                                for ($j=0; $j < $request->num_option[$nO]; $j++) {
                                    detail_question::create([
                                        'question_id' => $question->id,
                                        'num' => $j,
                                        'option' => $request->text_radio[$nOtR],
                                        'type' => $request->type[$i]
                                    ]);
                                    $nOtR++;
                                }
                            }else {
                                for ($j=0; $j < $request->num_option[$nO]; $j++) {
                                    $detail = detail_question::where('question_id',$question->id)->where('num',$j)->first();
                                    if ($detail) {
                                        $detail->update([
                                            'option' => $request->text_radio[$nOtR],
                                            'type' => $request->type[$i],
                                        ]);
                                    }else {
                                        detail_question::create([
                                            'question_id' => $question->id,
                                            'num' => $j,
                                            'option' => $request->text_radio[$nOtR],
                                            'type' => $request->type[$i]
                                        ]);
                                    }
                                    $nOtR++;
                                }
                            }
                            }
                        $nO++;
                        break;
                    case "4":
                        if ($request->num_option[$nO]) {
                            if ($change == 0) {
                                for ($j=0; $j < $request->num_option[$nO]; $j++) { 
                                    detail_question::create([
                                        'question_id' => $question->id,
                                        'num' => $j,
                                        'option' => $request->text_checkbox[$nOtC],
                                        'type' => $request->type[$i]
                                    ]);
                                    $nOtC++;
                                }
                            }else {
                                for ($j=0; $j < $request->num_option[$nO]; $j++) { 
                                    $detail = detail_question::where('question_id',$question->id)->where('num',$j)->first();
                                    if ($detail) {
                                        $detail->update([
                                            'option' => $request->text_checkbox[$nOtC],
                                            'type' => $request->type[$i],
                                        ]);
                                    }else {
                                        detail_question::create([
                                            'question_id' => $question->id,
                                            'num' => $j,
                                            'option' => $request->text_checkbox[$nOtC],
                                            'type' => $request->type[$i]
                                        ]);
                                    }
                                    $nOtC++;
                                }
                            }
                            }
                        $nO++;
                        break;
                    case "5":
                        if ($request->num_option[$nO]) {
                            if ($change == 0) {
                                for ($j=0; $j < $request->num_option[$nO]; $j++) { 
                                    detail_question::create([
                                        'question_id' => $question->id,
                                        'num' => $j,
                                        'option' => $request->text_select[$nOtS],
                                        'type' => $request->type[$i]
                                    ]);
                                    $nOtS++;
                                }
                            }else {
                                for ($j=0; $j < $request->num_option[$nO]; $j++) { 
                                    $detail = detail_question::where('question_id',$question->id)->where('num',$j)->first();
                                    if ($detail) {
                                        $detail->update([
                                            'option' => $request->text_select[$nOtS],
                                            'type' => $request->type[$i],
                                        ]);
                                    }else {
                                        detail_question::create([
                                            'question_id' => $question->id,
                                            'num' => $j,
                                            'option' => $request->text_select[$nOtS],
                                            'type' => $request->type[$i]
                                        ]);
                                    }
                                    $nOtS++;
                                }
                            }
                        }
                        $nO++;
                        break;
                    case "6":
                        if ($request->num_option_file[$nF]) {
                            if ($change == 0) {
                                for ($j=0; $j < $request->num_option_file[$nF]; $j++) {
                                    detail_question::create([
                                        'question_id' => $question->id,
                                        'num' => $j,
                                        'option' =>  $request->type_file[$nFt],
                                        'type' => $request->type[$i]
                                    ]);
                                    $nFt++;
                                }
                            }else {
                                for ($j=0; $j < $request->num_option_file[$nF]; $j++) { 
                                    $detail = detail_question::where('question_id',$question->id)->where('num',$j)->first();
                                    if ($detail) {
                                        $detail->update([
                                            'option' => $request->type_file[$nFt],
                                            'type' => $request->type[$i],
                                        ]);
                                    }else {
                                        detail_question::create([
                                            'question_id' => $question->id,
                                            'num' => $j,
                                            'option' =>  $request->type_file[$nFt],
                                            'type' => $request->type[$i]
                                        ]);
                                    }
                                    $nFt++;
                                }
                            }
                        }
                        $nF++;
                        break;
                    default:
                        
                        break;
                }
            }
        }
        return redirect()->route('forms')->with('success','Se ha actualizado el formulario correctamente');
    }

    public function delete(form $id)
    {
        // foreach ($id->orders as $order) {
        //     foreach ($order->answers as $option
        //     ) {
        //         Answer::where('id',$option->id)->delete();
        //     }
        //     order::where('id',$order->id)->delete();
        // }
        // foreach ($id->questions as $question) {
        //     foreach ($question->options as $option) {
        //         detail_question::where('id',$option->id)->delete();
        //     }
        //     question::where('id',$question->id)->delete();
        // }
        $id->delete();
        return redirect()->route('forms')->with('success','Se ha eliminado el formulario correctamente');
    }

    public function show(form $id)
    {
        return view('forms.show',compact('id'));
    }

    public function answer(form $id)
    {
        return view('forms.answer',compact('id'));
    }

    public function export(form $id)
    {
        return (new AnswersExport)->forId($id)->download('answers.xlsx');
    }
}