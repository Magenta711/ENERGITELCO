<?php

namespace App\Http\Controllers;

use App\Models\LearnedLeassonsTest;
use App\Models\LearnedLeassonsTestOption;
use Illuminate\Http\Request;

class learnedLessonsTestController extends Controller
{
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
            'question' => auth()->id(),
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
