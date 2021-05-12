<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class  Memorandum  extends Model
{
    protected $table = "memoranda";
    protected $fillable = ['responsable','header','affair','references','state'];
    protected $guarder = ['id'];

    public function responsable_memo()
    {
        return $this->hasOne(User::class, 'id', 'responsable');
    }

    public function receivers()
    {
        return $this->hasMany(ConfirmMemorandum::class, 'memorandum_id', 'id');
    }
}
