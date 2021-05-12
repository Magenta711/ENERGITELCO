<?php

namespace App\Models\project\planing;

use App\Models\Positions;
use Illuminate\Database\Eloquent\Model;

class commission_technical extends Model
{
    protected $table = "commission_technicals";
    protected $fillable = ['position_id','value','days'];
    protected $guarder = ['id'];

    public function position()
    {
        return $this->hasOne(Positions::class, 'id', 'position_id');
    }
}
