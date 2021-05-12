<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class invComputer extends Model
{
    protected $table = 'inv_computers';
    protected $fillable = ['brand','serial','model','cpu','rom','ram','so','software','graphic_card','office','antivirus','elemets','warranty','ports','tecnology','wireless_connectivity','license','type','site','mac','avatar','start_date','end_date','user_id','commentary','status'];
    protected $guarder = "id";

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}