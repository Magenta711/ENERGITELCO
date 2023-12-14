<?php

use App\User;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = "contracts";
    protected $fillable = ['register_id','signatured_at','type_contract','renovation','start_date','end_date','signature_end','last_date','salary','day_breack','months','isAuto','status','has_witness'];
    protected $guarder = ['id'];

    public function register()
    {
        return $this->hasOne(Register::class, 'id','register_id');
    }

    public function wittnessEndWork()
    {
        return $this->hasOne(User::class, 'id','has_witness');
    }

    public function file()
    {
        return $this->morphOne(file::class, 'fileble');
    }
}
