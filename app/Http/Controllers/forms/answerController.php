<?php

namespace App\Http\Controllers\forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\autoForm\Answer;
use App\Models\autoForm\form;
use App\Models\autoForm\order;
use App\Models\autoForm\UserForm;
use App\Notifications\notificationMain;
use App\User;
use Illuminate\Support\Facades\Storage;

class answerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Ver lista de respuestas', ['only' => ['index']]);
    }
    public function index()
    {
        if (auth()->user()->hasPermissionTo('Ver todas las respuestas')) {
            $answers = order::get();
        }else{
            if (auth()->user()->hasPermissionTo('Ver respuestas del cliente propias')) {
                $answers = order::where('user_id',auth()->user()->id)->get();
            }
        }
        return view('forms.answers.index',compact('answers'));
    }

    public function show(order $id)
    {
        return view('forms.answers.show',compact('id'));
    }

    public function create($form,string $email = null)
    {
        $id = form::where('token',$form)->first();
        if ($id) {
            if ($id->from_to_auth) {
                if (!auth()->check()) {
                    return abort(404);
                }
            }else {
                if (!auth()->check()) {
                    if (!$email) {
                        return redirect()->route('answers_email',[ 'form' => $form]);
                    }
                    $user = UserForm::where('secret',$email)->first();
                    if (!$user) {
                        return abort(404);
                    }
                }
            }
            
            return view('forms.answers.create',compact('id','form'));
        }
        return abort(404);
    }

    public function store(Request $request)
    {
        // $user = User::where('token',$request->user)->first();
        $form = form::where('token',$request->form)->first();
        $answer = order::create([
            'form_id' => $form->id,
            'user_id' => auth()->id(),
            'responder_id' => auth()->id(),
        ]);
        $nt = 0;
        $nta = 0;
        $nr = 0;
        $nc = 0;
        $nci = 0;
        $ns = 0;
        $nf = 0;
        $nfp = 0;
        $nd = 0;
        $ntm = 0;
        $r = '';
        foreach ($form->questions as $question) {
            switch ($question->type) {
                case "1":
                    Answer::create([
                        'question_id'=>$question->id,
                        'answer'=>$request->text[$nt],
                        'order_id' => $answer->id
                    ]);
                    $nt++;
                break;
                case "2":
                    Answer::create([
                        'question_id'=>$question->id,
                        'answer'=>$request->text_area[$nta],
                        'order_id' => $answer->id
                    ]);
                    $nta++;
                    break;
                case "3":
                    if(isset($request->radio[$question->id])){
                        Answer::create([
                            'question_id'=>$question->id,
                            'answer'=>$request->radio[$question->id],
                            'order_id' => $answer->id
                        ]);
                    }
                    $nr++;
                    break;
                case "4":
                    for ($i=0; $i < $request->num_checked[$nc]; $i++) { 
                        Answer::create([
                            'question_id'=>$question->id,
                            'answer'=>$request->checkbox[$nci],
                            'order_id' => $answer->id,
                            'num' => ($i+1)
                        ]);
                        $nci++;
                    }
                    $nc++;
                    break;
                case "5":
                    Answer::create([
                        'question_id'=>$question->id,
                        'answer'=>$request->select[$ns],
                        'order_id' => $answer->id
                    ]);
                    $ns++;
                    break;
                case "6":
                    if (isset($request->num_file[$nfp])) {
                        for ($i=0; $i < $request->num_file[$nfp]; $i++) { 
                            if ($request->hasFile('file')){
                                if ($file = $request->file('file')[$nf]) {
                                    $name = time().$file->getClientOriginalName();
                                    $path = Storage::putFileAs('public/upload/files', $file, $name);
                                    Answer::create([
                                        'question_id'=>$question->id,
                                        'answer'=>$name,
                                        'order_id' => $answer->id,
                                        'num' => ($i+1)
                                    ]);
                                }
                                $nf++;
                            }
                        }
                    }
                    $nfp++;
                    break;
                case "7":
                    Answer::create([
                        'question_id'=>$question->id,
                        'answer'=>$request->date[$nd],
                        'order_id' => $answer->id
                    ]);
                    $nd++;
                    break;
                case "8":
                    Answer::create([
                        'question_id'=>$question->id,
                        'answer'=>$request->time[$ntm],
                        'order_id' => $answer->id
                    ]);
                    $ntm++;
                    break;
                
                default:
                    
                    break;
            }
        }

        $users = User::where('state',1)->get();
        // $user->notify(new notificationMain($answer->id,'Nueva respuesta '.$answer->id,'answers/'.$answer->id));
        // foreach ($users as $use) {
        //     if ($use->hasPermissionTo('Ver lista de respuestas')) {
        //         $use->notify(new notificationMain($answer->id,'Nueva respuesta '.$answer->id,'answers/'.$answer->id));
        //     }
        // }

        return redirect()->route('answers_ready');
    }

    public function ready()
    {
        return view('forms.answers.ready');
    }

    public function delete(order $id)
    {
        foreach ($id->answers as $answers) {
            Answer::where('id',$answers->id)->delete();
        }
        $id->delete();
        return redirect()->route('answers')->with('success','Se ha eliminado la respuesta');
    }

    public function register_email($form)
    {
        $id = form::where('token',$form)->first();
        if ($id) {
            return view('forms.answers.email',compact('form'));
        }
        return abort(404);
    }
    public function register_email_store(Request $request,$form)
    {
        $id = form::where('token',$form)->first();
        if ($id) {
            $user_form = UserForm::where('email',$request->email)->first();
            if (!$user_form) {
                $user_form = UserForm::create([
                    'email'=>$request->email,
                    'form_id'=>$id->id,
                    'secret'=>encrypt($request->email),
                    'status'=>0
                ]);
            }
            return redirect()->route('answers_create',[$form,$user_form->secret]);
        }
        return abort(404);
    }
}
