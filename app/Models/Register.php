<?php

namespace App\Models;

use App\Models\human_magement\Letter;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = "registers";
    protected $fillable = ['request_id','name','email','document','address','tel','age','position_id','marital_status',
    'photo','rh','state','letter1','letter2','letter3','letter4','date_end',
    'place_residence','neighborhood','date_birth','eps','arl','pension','emergency_contact','emergency_contact_number','shirt_size','pant_size','shoe_size','nationality','weight','height','type_bank_account','bank_account','date'];
    protected $guarder = ['id'];
    
    public function interview()
    {
        return $this->hasOne(interview::class,'register_id','id');
    }
    
    public function curriculum()
    {
        return $this->hasOne(curriculum::class,'register_id','id');
    }

    public function position()
    {
        return $this->hasOne(Positions::class, 'id', 'position_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'register_id', 'id');
    }

    public function request (){
        return $this->hasOne(WorkWithUs::class, 'id','request_id');
    }

    public function letters()
    {
        return $this->hasMany(Letter::class,'register_id','id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'register_id','id');
    }

    public function hasContract()
    {
        foreach ($this->contracts as $value) {
            if ($value->status == 1) {
                if ($value->end_date && $value->end_date < now()) {
                    return false;
                }
                return $value;
            }
        }
        return false;
    }

    public function contractApprove()
    {
        Contract::where('register_id',$this->id)->where('status',2)->update([
            'status' => 1
        ]);
    }
}
