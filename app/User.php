<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Positions;
use App\Models\Register;
use App\Models\Work1;
use App\Models\Work2;
use App\Models\Work3;
use App\Models\Work4;
use App\Models\Work5;
use App\Models\Work6;
use App\Models\Work7;
use App\Models\Document;
use App\Models\attention_call\AttentionCall;
use App\Models\bonus24;
use App\Models\bonus\bonu;
use App\Models\bonus\bonusUser;
use App\Models\bonus\MinorBoxUser;
use App\Models\ccjl\ccjl_rents;
use App\Models\ConfirmMemorandum;
use App\Models\curriculum;
use App\Models\execution_work\invTool;
use App\Models\hasPermissionWork;
use App\Models\human_magement\improvementActionDetailUser;
use App\Models\interview;
use App\Models\invComputer;
use App\Models\project\route\Routes;
use App\Models\Work8Users;
use App\Models\InvUser;
use App\Models\PerformanceEvaluation;
use App\Models\ProceedingCommitment;
use App\Models\signature;
use App\Models\Work10;
use App\Models\work1_cut_bonus;
use App\Models\Work8;
use App\Models\execution_work\assigment;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles;
    use Notifiable;

    public function work1()
    {
        return $this->morphedByMany(Work1::class, 'responsibles');
    }
    public function routes()
    {
        return $this->morphedByMany(Routes::class, 'responsibles');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','cedula','direccion','telefono','foto','cargo','area','state','position_id', 'email_verified_at', 'register_id','b24_7','last_24_7','time_24_7','cut_24_7','signature'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function position()
    {
        return $this->hasOne(Positions::class, 'id', 'position_id');
    }
    public function register()
    {
        return $this->hasOne(Register::class, 'id', 'register_id');
    }
    public function attention_call()
    {
        return $this->hasMany(AttentionCall::class, 'receiver', 'id');
    }
    public function signatures()
    {
        return $this->morphedByMany(Document::class, 'signatures');
    }
    public function works1()
    {
        return $this->hasMany(Work1::class, 'responsable', 'id');
    }
    public function works2()
    {
        return $this->hasMany(Work2::class, 'responsable', 'id');
    }
    public function works3()
    {
        return $this->hasMany(Work3::class, 'responsable', 'id');
    }
    public function works4()
    {
        return $this->hasMany(Work4::class, 'responsable', 'id');
    }
    public function works5()
    {
        return $this->hasMany(Work5::class, 'responsable', 'id');
    }
    public function works6()
    {
        return $this->hasMany(Work6::class, 'responsable', 'id');
    }
    public function works7()
    {
        return $this->hasMany(Work7::class, 'responsable', 'id');
    }
    public function workPermssion7()
    {
        return $this->hasMany(Work7::class, 'cedula_trabajador', 'id');
    }
    
    public function Work8Users()
    {
        return $this->hasMany(Work8Users::class, 'user_id', 'id');
    }
    
    public function assigment_kits()
    {
        return $this->hasMany(assigment::class, 'id_asignado', 'id');
    }

    public function numAssigment()
    {
        return count($this->assigment_kits);
    }

    public function getLastAssigment()
    {
        return assigment::where('id_asignado',$this->id)->latest('created_at')->first();
    }

    public function approvals()
    {
        $form1 = Work1::where('coordinador',$this->id)->get()->count();
        $form2 = Work2::where('coordinador',$this->id)->get()->count();
        $form3 = Work3::where('coordinador',$this->id)->get()->count();
        $form4 = Work4::where('coordinador',$this->id)->get()->count();
        $form5 = Work5::where('coordinador',$this->id)->get()->count();
        $form6 = Work6::where('coordinador',$this->id)->get()->count();
        $form7 = Work7::where('coordinador',$this->id)->get()->count();
        $attention = AttentionCall::where('approver',$this->id)->count();
        return ($form1 + $form2 + $form3 + $form4 + $form5 + $form6 + $form7 + $attention);
    }

    public function responsable()
    {
        $form1 = Work1::where('responsable',$this->id)->get()->count();
        $form2 = Work2::where('responsable',$this->id)->get()->count();
        $form3 = Work3::where('responsable',$this->id)->get()->count();
        $form4 = Work4::where('responsable',$this->id)->get()->count();
        $form5 = Work5::where('responsable',$this->id)->get()->count();
        $form6 = Work6::where('responsable',$this->id)->get()->count();
        $form7 = Work7::where('responsable',$this->id)->get()->count();
        $attention = AttentionCall::where('approver',$this->id)->count();
        return ($form1 + $form2 + $form3 + $form4 + $form5 + $form6 + $form7 + $attention);
    }

    public function minor_box()
    {
        return $this->hasOne(MinorBoxUser::class, 'user_id','id');
    }
    public function report_24_7()
    {
        return $this->hasMany(bonus24::class, 'user_id','id');
    }

    public function inventories()
    {
        return $this->hasMany(InvUser::class, 'user_id','id');
    }

    public function hasCredit()
    {
        return ccjl_rents::whereHas('client',function ($query) {
            return $query->where('document',$this->cedula);
        })->get();
    }

    public function signature_curriculum_num()
    {
        return signature::where('signatures_type','App\Models\document')->where('user_id',$this->id)->count();
    }

    public function hasPermisisonWork()
    {
        return $this->hasOne(hasPermissionWork::class,'user_id','id');
    }

    // Proyectos
    // public function unapprovedProject()
    // {
    //     return ;
    // }
    // Inspeccion detallada de vehiculos
    public function unapprovedDateilVehicles()
    {
        return Work3::where('responsable',$this->id)->where('estado','Sin aprobar')->get();
    }
    // Multas pendientes
    public function unpaymentTransitTaxes()
    {
        return DriversReport::where('driver_id',$this->id)->where('status',0)->get();
    }
    // Permisos de trabajo
    public function unapprovedWorkPermit()
    {
        return Work1::where('responsable',$this->id)->where('estado','Sin aprobar')->get();
    }
    // Equipos de proteccion contra caidas
    public function unapprovedFallProtection()
    {
        return Work2::where('responsable',$this->id)->where('estado','Sin aprobar')->get();
    }
    // Entrega de dotacion
    public function unapproveDreviewTool()
    {
        return Work4::where('responsable',$this->id)->where('estado','Sin aprobar')->get();
    }
    // Entrega de dotacion
    public function unapprovedDeliveryStaffing()
    {
        return Work5::where('responsable',$this->id)->where('estado','Sin aprobar')->get();
    }
    // Lista de verificación de computadores
    public function unapprovedCheckListComputer()
    {
        return Work6::where('responsable',$this->id)->where('estado','Sin aprobar')->get();
    }
    // Permiso laboral o notificacion de incapacidad medica
    public function unapprovedWorkNotifications()
    {
        return Work7::where('responsable',$this->id)->where('estado','Sin aprobar')->get();
    }
    // Reporte de novedades de nomina y horas extras
    public function unapprovedPayrollOverTime()
    {
        return Work8::where('responsable',$this->id)->where('estado','Sin aprobar')->get();
    }
    // Actas
    public function unapprovedProceedings()
    {
        return ProceedingCommitment::where('user_id',$this->id)->whereHas('proceeding',function ($query)
        {
            return $query->where('status',3)->where('status',2);
        })->get();
    }
    // Acciones de mejora
    public function unconfirmedAcction()
    {
        return improvementActionDetailUser::where('user_id',$this->id)->whereHas('detail',function ($query)
        {
            return $query->whereHas('improvement',function ($query)
            {
                return $query->where('status',2);
            });
        })->get();
    }
    // Caja menor
    public function unapprovedBoxes()
    {
        return work1_cut_bonus::where('user_id',$this->id)->where('status',3)->get();
    }
    // Bonificaciones
    public function unapprovedBonuses()
    {
        return bonu::where('responsable_id',$this->id)->where('status',2)->get();
    }
    // Bonificacion del usuario
    public function unapprovedBonuUser()
    {
        return bonusUser::where('user_id',$this->id)->wherehas('bonu',function ($query)
        {
            $query->where('status',2);
        })->get();
    }
    // config form obligatory
    // public function unapprovedForms()
    // {
    //     return PerformanceEvaluation::where('user_id',$this->id)->where(function ($query) {
    //         $query->where('state','Sin leer')->orwhere('state','Sin aprobar');
    //     })->get();
    // }
    // Evaluacion de desempeño
    public function unapprovedEvaluation()
    {
        return PerformanceEvaluation::where('user_id',$this->id)->where(function ($query) {
            $query->where('state','Sin leer')->orwhere('state','Sin aprobar');
        })->get();
    }
    // Descargos
    public function unapprovedCallAttetion()
    {
        return AttentionCall::where('receiver',$this->id)->where(function ($query) {
            $query->where('state','Sin aprobar')->orwhere('state','Sin argumentos');
        })->get();
    }
    // Memorandos
    public function unconfirmedMemoradums()
    {
        return ConfirmMemorandum::where('user_id',$this->id)->where('state',0)->get();
    }
    // Entrevistas
    public function unapprovedInterview()
    {
        return interview::where('responsable_id',$this->id)->where('state','Sin aprobar')->get();
    }
    // Hoja de vida
    public function unapprovedCurriculum()
    {
        return curriculum::whereHas('register',function ($query)
        {
            return $query->where('document',$this->cedula);
        })->where('state','Sin aprobar')->get();
    }
    // Solicitud de carta laboral
    public function unapprovedSeverance()
    {
        return Work10::where('responsable_id',$this->id)->where('estado','Sin aprobar')->get();
    }
    // Herramienta prestada
    public function tools()
    {
        return $this->hasMany(invTool::class,'user_id','id');
    }
    // Computador
    public function computers()
    {
        return $this->hasMany(invComputer::class,'user_id','id');
    }

}