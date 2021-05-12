<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\general_setting;
use App\Models\system_setting;
use App\Models\Work1;
use App\Models\Work2;
use App\Models\Work3;
use App\Models\Work4;
use App\Models\Work5;
use App\Models\Work6;
use App\Models\Work7;
use App\Models\Work8;
use App\Models\Work10;
use App\Models\curriculum;
use App\Models\interview;
use App\Models\PerformanceEvaluation;
use App\Models\attention_call\AttentionCall;
use App\Models\project\Clearing;
use App\Models\project\Mintic\Mintic_School;
use App\Models\project\planing\Project;
use App\Models\project\route\Routes;
use App\Models\work1_cut_bonus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Notifications\notificationMain;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Session;

class approvalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('verified');
        $this->middleware('permission:Aprobar solicitud de Permisos de trabajo|Aprobar solicitud de Inspección y protección contra caídas|Aprobar solicitud de Inspección detallada de vehículos|Aprobar solicitud de Revisión y asignación de herramientas|Aprobar solicitud de entrega de dotación personal|Aprobar solicitud de lista de verificación para el mantenimiento de computadores|Aprobar solicitud de permiso laboral o notificación de incapacidad|Consultar permisos de trabajo|Consultar inspecciones de equipos de protección contra caídas|Consultar inspecciones detalladas de vehiíulos|Consultar revisión y asignación de herramientas|Consultar entrega de dotación personal|Consultar listas de verificación para el mantenimiento de los computadores|Consultar solicitud de permisos laborales o notificaciones de incapacidad médica', ['only' => ['index']]);
        $this->middleware('permission:Aprobar solicitud de Permisos de trabajo', ['only' => ['approval_work_1','dont_approval_work_1']]);
        $this->middleware('permission:Aprobar solicitud de Inspección y protección contra caídas', ['only' => ['approval_work_2','dont_approval_work_2']]);
        $this->middleware('permission:Aprobar solicitud de Inspección detallada de vehículos', ['only' => ['approval_work_3','dont_approval_work_3']]);
        $this->middleware('permission:Aprobar solicitud de Revisión y asignación de herramientas', ['only' => ['approval_work_4','dont_approval_work_4']]);
        $this->middleware('permission:Aprobar solicitud de entrega de dotación personal', ['only' => ['approval_work_5','dont_approval_work_5']]);
        $this->middleware('permission:Aprobar solicitud de lista de verificación para el mantenimiento de computadores', ['only' => ['approval_work_6','dont_approval_work_6']]);
        $this->middleware('permission:Aprobar solicitud de permiso laboral o notificación de incapacidad', ['only' => ['approval_work_7','dont_approval_work_7']]);
        $this->middleware('permission:Consultar permisos de trabajo', ['only' => ['show1']]);
        $this->middleware('permission:Consultar inspecciones de equipos de protección contra caídas', ['only' => ['show2']]);
        $this->middleware('permission:Consultar inspecciones detalladas de vehículos', ['only' => ['show3']]);
        $this->middleware('permission:Consultar Revisión y asignación de herramientas', ['only' => ['show4']]);
        $this->middleware('permission:Consultar entrega de dotación personal', ['only' => ['show5']]);
        $this->middleware('permission:Consultar listas de verificación para el mantenimiento de los computadores', ['only' => ['show6']]);
        $this->middleware('permission:Consultar solicitud de permisos laborales o notificaciones de incapacidad médica', ['only' => ['show7']]);
    }

    public function index()
    {
        $trabajos1 = Work1::with('responsableAcargo')->where('estado','Sin aprobar')->orderBy('id')->get();
        $trabajos2 = Work2::with('responsableAcargo')->where('estado','Sin aprobar')->orderBy('id')->get();
        $trabajos3 = Work3::with('responsableAcargo')->where('estado','Sin aprobar')->orderBy('id')->get();
        $trabajos4 = Work4::with('responsableAcargo')->where('estado','Sin aprobar')->orderBy('id')->get();
        $trabajos5 = Work5::with('responsableAcargo')->where('estado','Sin aprobar')->orderBy('id')->get();
        $trabajos6 = Work6::with('responsableAcargo')->where('estado','Sin aprobar')->orderBy('id')->get();
        $trabajos7 = Work7::with('responsableAcargo')->where('estado','Sin aprobar')->orderBy('id')->get();
        $trabajos8 = Work8::with('responsableAcargo')->where('estado','Sin aprobar')->orderBy('id')->get();
        $trabajos10 = Work10::with('responsableAcargo')->where('estado','Sin aprobar')->orderBy('id')->get();
        $attention_calls = AttentionCall::with(['responsableCall','receiverCall'])->where('state','Sin aprobar')->orderBy('id')->get();
        $interviews = interview::with(['register','responsable'])->where('state','Sin aprobar')->orderBy('id')->get();
        $performance = PerformanceEvaluation::with('evaluado','responsable')->where('state','Sin aprobar')->orderBy('id')->get();
        $curriculums = curriculum::where('state','Sin aprobar')->with(['register','responsable'])->where('state','Sin aprobar')->orderBy('id')->get();
        $projects = Project::where('state','Sin aprobar')->with('responsable')->get();
        $mintics = Mintic_School::where('status',0)->with('responsable')->get();
        $routes = Routes::where('status',3)->with('responsable')->get();
        $clearings = Clearing::where('status',0)->with('responsable')->get();
        $cuts = work1_cut_bonus::where('status',2)->with('responsable')->get();
        
        return view('approvals.index',compact("trabajos1",'trabajos2','trabajos3','trabajos4','trabajos5','trabajos6','trabajos7','trabajos8','trabajos10','attention_calls','interviews','performance','curriculums','projects','mintics','routes','clearings','cuts'));
    }
    

}