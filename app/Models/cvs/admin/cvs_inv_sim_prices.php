<?php

namespace App\Models\cvs\admin;

use App\Models\cvs\inventory\cvs_inv_sim_type;
use Illuminate\Database\Eloquent\Model;

class cvs_inv_sim_prices extends Model
{
    protected $table = "cvs_inv_sim_prices";
    protected $fillable = ['sede_id','sim_type_id','prices'];
    protected $guarder = ['id'];

    public function sede()
    {
        return $this->hasOne(cvs_sede::class, 'id', 'sede_id');
    }

    public function sim_type()
    {
        return $this->hasOne(cvs_inv_sim_type::class, 'id', 'sim_type_id');
    }
}
