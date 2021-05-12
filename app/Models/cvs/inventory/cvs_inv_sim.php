<?php

namespace App\Models\cvs\inventory;

use App\Models\cvs\cvs_sale_detail;
use App\User;
use Illuminate\Database\Eloquent\Model;

class cvs_inv_sim extends Model
{
    protected $table = "cvs_inv_sims";
    protected $fillable = ['cod','description','type_id','user_id','deliver_date','date','status'];
    protected $guarder = ['id'];

    public function type()
    {
        return $this->hasOne(cvs_inv_sim_type::class, 'id', 'type_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function productables()
    {
        return $this->morphMany(cvs_sale_detail::class, 'productable');
    }
}
