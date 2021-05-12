<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    protected $table = "positions";
    protected $fillable = ['name','type_evaluation','description','offer','state','jerarquia'];
    protected $guarder = ['id'];

    public function users()
    {
        return $this->hasMany(User::class, 'position_id','id');
    }

    public function user_count()
    {
        $i = 0;
        foreach ($this->users as $user) {
            if ($user->state == 1) {
                $i++;
            }
        }
        return $i;
    }
}
