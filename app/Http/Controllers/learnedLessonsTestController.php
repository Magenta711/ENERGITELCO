<?php

namespace App\Http\Controllers;

use App\Exports\AnswersLearnedLeassonsExport;
use App\Models\LearnedLeassonsTest;
use App\Models\LearnedLeassonsTestOption;
use App\Models\LearnedLeassonsTestUsers;
use Carbon\Carbon;
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

    public function export(Request $request)
    {
        Carbon::setWeekStartsAt(Carbon::MONDAY);
        Carbon::setWeekEndsAt(Carbon::SUNDAY);

        switch ($request->by) {
            case '1': //Hoy
                $data = LearnedLeassonsTestUsers::whereDate('created_at',now()->format('Y-m-d'))->get();
                $start_month = now()->format('m');
                $end_month = now()->format('m');
                break;
            case '2': //Día
                $start_month = Carbon::create($request->by_day)->format('m');
                $end_month = Carbon::create($request->by_day)->format('m');
                $data = LearnedLeassonsTestUsers::whereDate('created_at', $request->by_day)->get();
                break;
            case '3': //Semana
                $time = Carbon::create($request->by_week);
                $start_month = $time->startOfWeek()->format('m');
                $end_month = $time->endOfWeek()->format('m');
                $data = LearnedLeassonsTestUsers::whereBetween('created_at', [$time->startOfWeek()->format('Y-m-d'), $time->endOfWeek()->format('Y-m-d')])->get();
                break;
            case '4': //Mes
                $time = Carbon::create($request->by_month)->format('m');
                $timeY = Carbon::create($request->by_month)->format('Y');
                $start_month = $time;
                $end_month = $time;
                $data = LearnedLeassonsTestUsers::whereYear('created_at',$timeY)->whereMonth('created_at',$time)->get();
                break;
            case '5': //Año
                $start_month = 1;
                $end_month = 12;
                $data = LearnedLeassonsTestUsers::whereYear('created_at',$request->by_year)->get();
                break;
            case '6': //Rango
                $start_month = Carbon::create($request->start_day)->format('m');
                $end_month = Carbon::create($request->end_date)->format('m');
                $data = LearnedLeassonsTestUsers::whereBetween('created_at', [$request->start_day, $request->end_date])->get();
                break;
            default:
                return redirect()->back()->withErrors(['Consulta invalidad']);
                break;
        }

        // return $data;
        // By Test
        $arrTests = array();
        foreach ($data as $key => $value) {
            if (array_key_exists($value->test_id,$arrTests)) {
                $status = $value->status;
                $good = ((isset($value->answer->answer) && $value->answer->answer == 1 && $status == 1) ? 1 : 0);
                $bad = ((isset($value->answer->answer) && $value->answer->answer == 0 && $status == 1) ? 1 : 0);
                $total = $arrTests[$value->test_id]['total'] + 1;
                $total_ass = $arrTests[$value->test_id]['total_ass'] + $status;
                $total_anass = $arrTests[$value->test_id]['total_anass'] + ($status == 0 ? 1 : 0);
                $total_good = $arrTests[$value->test_id]['total_good'] + $good;
                $total_bad = $arrTests[$value->test_id]['total_bad'] + $bad;
                if ($total_ass == 0) {
                    $pormedio_good = 0;
                }else {
                    $pormedio_good = 100 * $total_good / $total_ass;
                }
                if ($total_ass == 0) {
                    $pormedio_bad = 0;
                }else {
                    $pormedio_bad = 100 * $total_bad / $total_ass;
                }

                $arrTests[$value->test_id] = [
                    'id' => $value->test_id,
                    'question' => $value->test->question,
                    'total' => $total,
                    'total_ass' => $total_ass,
                    'total_anass' => $total_anass,
                    'total_good' => $total_good,
                    'total_bad' => $total_bad,
                    'pormedio_good' => number_format($pormedio_good,2,',','.').'%',
                    'pormedio_bad' => number_format($pormedio_bad,2,',','.').'%',
                ];
            }else {
                $status = $value->status;
                $good = ((isset($value->answer->answer) && $value->answer->answer == 1 && $status == 1) ? 1 : 0);
                $bad = ((isset($value->answer->answer) && $value->answer->answer == 0 && $status == 1) ? 1 : 0);

                $pormedio_good = 100 * $good / 1;
                $pormedio_bad = 100 * $bad / 1;

                $arrTests[$value->test_id] = [
                    'id' => $value->test_id,
                    'question' => $value->test->question,
                    'total' => 1,
                    'total_ass' => $status == 1 ? 1 : 0,
                    'total_anass' => $status == 0 ? 1 : 0,
                    'total_good' => $good,
                    'total_bad' => $bad,
                    'pormedio_good' => $pormedio_good.'%',
                    'pormedio_bad' => $pormedio_bad.'%',
                ];
            }
        }

        // return $arrTests;

        $arrUsers = array();

        foreach ($data as $key => $value) {
            if (array_key_exists($value->user_id,$arrUsers)) {
                $status = $value->status;
                $good = ((isset($value->answer->answer) && $value->answer->answer == 1 && $status == 1) ? 1 : 0);
                $bad = ((isset($value->answer->answer) && $value->answer->answer == 0 && $status == 1) ? 1 : 0);
                $total = $arrUsers[$value->user_id]['total'] + 1;
                $total_ass = $arrUsers[$value->user_id]['total_ass'] + $status;
                $total_anass = $arrUsers[$value->user_id]['total_anass'] + ($status == 0 ? 1 : 0);
                $total_good = $arrUsers[$value->user_id]['total_good'] + $good;
                $total_bad = $arrUsers[$value->user_id]['total_bad'] + $bad;
                if ($total_ass == 0) {
                    $pormedio_good = 0;
                }else {
                    $pormedio_good = 100 * $total_good / $total_ass;
                }
                if ($total_ass == 0) {
                    $pormedio_bad = 0;
                }else {
                    $pormedio_bad = 100 * $total_bad / $total_ass;
                }

                $arrUsers[$value->user_id] = [
                    'cedula' => $value->user->cedula,
                    'name' => $value->user->name,
                    'total' => $total,
                    'total_ass' => $total_ass,
                    'total_anass' => $total_anass,
                    'total_good' => $total_good,
                    'total_bad' => $total_bad,
                    'pormedio_good' => number_format($pormedio_good,2,',','.').'%',
                    'pormedio_bad' => number_format($pormedio_bad,2,',','.').'%',
                ];
            }else {
                $status = $value->status;
                $good = ((isset($value->answer->answer) && $value->answer->answer == 1 && $status == 1) ? 1 : 0);
                $bad = ((isset($value->answer->answer) && $value->answer->answer == 0 && $status == 1) ? 1 : 0);

                $pormedio_good = 100 * $good / 1;
                $pormedio_bad = 100 * $bad / 1;
                $arrUsers[$value->user_id] = [
                    'cedula' => $value->user->cedula,
                    'name' => $value->user->name,
                    'total' => 1,
                    'total_ass' => $status == 1 ? 1 : 0,
                    'total_anass' => $status == 0 ? 1 : 0,
                    'total_good' => $good,
                    'total_bad' => $bad,
                    'pormedio_good' => $pormedio_good.'%',
                    'pormedio_bad' => $pormedio_bad.'%',
                ];
            }
        }

        return (new AnswersLearnedLeassonsExport($arrTests,$arrUsers,$start_month, $end_month))->download(time().'_repote_de_respuestas.xlsx');
    }
}
