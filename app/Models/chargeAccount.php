<?php

namespace App\Models;

use App\SignatureChargeAccount;
use App\User;
use Illuminate\Database\Eloquent\Model;

class chargeAccount extends Model
{
    protected $fillable = ['token','user_id','approve_id','city','date','name','document','concept','value','bank_account','type_bank_account','email','signature_id','expense_type','status'];
    protected $guarder = ['id'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function approve()
    {
        return $this->hasOne(User::class,'id','approve_id');
    }

    public function files()
    {
        return $this->hasMany(FormtFile::class, 'formulario','id');
    }

    public function signature()
    {
        return $this->morphOne(SignatureChargeAccount::class, 'signaturable');
    }
}
