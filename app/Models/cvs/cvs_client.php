<?php

namespace App\Models\cvs;

use Illuminate\Database\Eloquent\Model;

class cvs_client extends Model
{
    protected $table = "cvs_clients";
    protected $fillable = ['name','email','tel','document_type','document','send_emails','converged_client','status','token'];
    protected $guarder = ['id'];

    public function shopping()
    {
        return $this->hasMany(cvs_sale::class, 'client_id', 'id');
    }
}
