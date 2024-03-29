<?php

namespace App\Models\autoForm;

use Illuminate\Database\Eloquent\Model;

class form extends Model
{
    protected $fillable = [
        'name','description','responsible_id','token','form_type','rating_type','value_type','from_to_guest','from_to_auth','from_to_mail','limit_to_one','sort_randomly','mails','note','position','is_format','version','code','date'
    ];

    public function questions()
    {
        return $this->hasMany(question::class, 'form_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(order::class, 'form_id', 'id');
    }

    public function user_forms()
    {
        return $this->hasMany(UserForm::class, 'form_id','id');
    }
}
