<?php

namespace App\Models\execution_work;

use Illuminate\Database\Eloquent\Model;
use App\User;

class review_kits extends Model
{
    //
    protected $table = "review_kits";
    protected $fillable = [
    'id_review',
    'comentario',
    'id_kit',
    ];
    public function kit_revisado()
    {
        return $this->hasOne(kits::class, 'id','id_kit');
    }
}
