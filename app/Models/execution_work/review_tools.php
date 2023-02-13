<?php

namespace App\Models\execution_work;

use Illuminate\Database\Eloquent\Model;
use App\User;

class review_tools extends Model
{
    protected $table = 'review_tools';
    protected $fillable = [
        'id_asignado',
        'id_revisor',
        'fecha_revision'
    ];
    public function revision()
        {
            return $this->hasOne(review_kits::class, 'id_review','id');
        }
        public function revisor()
        {
            return $this->hasOne(User::class, 'id', 'id_revisor');
        }
}

