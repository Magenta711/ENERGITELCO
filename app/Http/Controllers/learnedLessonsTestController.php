<?php

namespace App\Http\Controllers;

use App\Models\LearnedLeassonsTest;
use App\Models\LearnedLeassonsTestOption;
use Illuminate\Http\Request;

class learnedLessonsTestController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de preguntas de lesiones aprendidas|Crear preguntas de lesiones aprendidas|Editar preguntas de lesiones aprendidas|Eliminar preguntas de lesiones aprendidas|Ver preguntas de lesiones aprendidas',['only' => ['index']]);
        $this->middleware('permission:Crear preguntas de lesiones aprendidas',['only' => ['create','store']]);
        $this->middleware('permission:Editar preguntas de lesiones aprendidas',['only' => ['edit','update']]);
        $this->middleware('permission:Ver preguntas de lesiones aprendidas',['only' => ['show']]);
        $this->middleware('permission:Eliminar preguntas de lesiones aprendidas',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testings = LearnedLeassonsTest::get();
        return view('learned_lessons.test.index',compact('testings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('learned_lessons.test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = LearnedLeassonsTest::create([
            'responsable_id' => auth()->id(),
            'question' => $request->question,
            'status' => 1,
        ]);
        
        foreach ($request->text_answer as $key => $value) {
            LearnedLeassonsTestOption::create([
                'text_answer' => $value,
                'num' => $key + 1,
                'answer' => isset($request->answer[$key]) ? 1 : 0,
                'status' => 1,
                'test_id' => $test->id,
            ]);
        }

        return redirect()->route('learned_lessons_test')->with('success','Se ha creado la pregunta correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('learned_lessons.test.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('learned_lessons.test.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LearnedLeassonsTest $id)
    {
        $id->update([
            'question' => $request->question,
            'status' => 1,
        ]);
        $numOption = count($id->options);
        LearnedLeassonsTestOption::where('test_id',$id->id)->update([
            'status' => 0
        ]);
        $j = 0;
        foreach ($id->options as $key => $value) {
            LearnedLeassonsTestOption::where('test_id',$id->id)->where('num',($j + 1))->update([
                'text_answer' => $request->text_answer[$j],
                'answer' => isset($request->answer[$j]) ? 1 : 0,
                'status' => 1,
            ]);
            $j++;
        }
        $i = 0;
        if ($numOption < count($request->text_answer)) {
            foreach ($request->text_answer as $value) {
                if ($i >= $j) {
                    LearnedLeassonsTestOption::create([
                        'text_answer' => $request->text_answer[$i],
                        'num' => ($i + 1),
                        'answer' => isset($request->answer[$i]) ? 1 : 0,
                        'status' => 1,
                        'test_id' => $id->id,
                    ]);
                }
                $i++;
            }
        }
        return redirect()->route('learned_lessons_test')->with('success','Se ha actualizado la pregunta correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LearnedLeassonsTest $id)
    {
        $id->delete();
        return redirect()->route('learned_lessons_test')->with('success','Se ha eliminado la pregunta correctamente');
    }
}
