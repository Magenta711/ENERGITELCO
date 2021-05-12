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
use App\Models\bonus\MinorBoxUser;
use App\Models\project\route\Routes;
use App\Models\Work8Users;

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
        'name', 'email', 'password','cedula','direccion','telefono','foto','cargo','area','state','position_id', 'email_verified_at', 'register_id'
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
}
// UPDATE `signatures` SET `signatures_type`='App\Models\document' WHERE `signatures_type` like 'App\User'