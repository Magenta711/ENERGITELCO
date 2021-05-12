<?php

namespace App\Models\ccjl;

use Illuminate\Database\Eloquent\Model;

class ccjl_clients extends Model
{
    protected $table = "ccjl_clients";
    protected $fillable = ['name','email','number','document_type','document','status'];
    protected $guarder = ['id'];

    public function rents()
    {
        return $this->hasMany(ccjl_rents::class,'client_id','id');
    }
}
