<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignatureChargeAccount extends Model
{
    protected $fillable = [
        'name','file','status','signaturable_type','signaturable_id'
    ];
    protected $guarder = ['id'];

    public function signaturable()
    {
        return $this->morphTo();
    }
}
