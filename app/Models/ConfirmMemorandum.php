<?php

namespace App\Models;

use App\User;

use Illuminate\Database\Eloquent\Model;

class ConfirmMemorandum extends Model
{
    protected $table = "confirm_memoranda";
    protected $fillable = ['user_id','memorandum_id','state'];
    protected $guarder = ['id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
