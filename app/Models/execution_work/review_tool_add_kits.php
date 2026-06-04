<?php

namespace App\Models\execution_work;

use Illuminate\Database\Eloquent\Model;
use App\User;

class review_tool_add_kits extends Model
{
    protected $table = "review_tool_add_kits";

    protected $fillable = [
    'id_review',
    'id_tool_add',
    'estado',
    'comentario',
    'id_kit',
    ];
    public function revision()
        {
            return $this->hasOne(review_kits::class, 'id_review','id_kit');

        }
    public function revision_tool_add()
        {
            return $this->hasOne(tools::class, 'id','id_tool_add');

        }
}

