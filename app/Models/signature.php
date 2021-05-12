<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class signature extends Model
{
    protected $table = "signatures";
    protected $fillable = ['signatures_type','signatures_id','user_id'];
    protected $guarder = ['id'];

    public function signaturable()
    {
        return $this->morphTo();
    }
}
