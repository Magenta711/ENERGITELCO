<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = "contracts";
    protected $fillable = ['register_id','signatured_at','type_contract','renovation','start_date','end_date','signature_end','last_date','salary','day_breack','months','isAuto','status'];
    protected $guarder = ['id'];

    public function register()
    {
        return $this->hasOne(Register::class, 'id','register_id');
    }

    public function file()
    {
        return $this->morphOne(file::class, 'fileble');
    }
}
