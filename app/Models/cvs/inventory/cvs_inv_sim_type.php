<?php

namespace App\Models\cvs\inventory;

use App\Models\cvs\admin\cvs_inv_sim_prices;
use Illuminate\Database\Eloquent\Model;

class cvs_inv_sim_type extends Model
{
    protected $table = "cvs_inv_sim_types";
    protected $fillable = ['name'];
    protected $guarder = ['id'];

    public function prices()
    {
        return $this->hasMany(cvs_inv_sim_prices::class,'sim_type_id','id');
    }

    public function sims()
    {
        return $this->hasMany(cvs_inv_sim::class, 'type_id', 'id');
    }

    public function hasPrices($id)
    {
        foreach ($this->prices as $value) {
            if ($value->sede_id == $id) {
                return $value->prices;
            }
        }
        return 0;
    }
}
