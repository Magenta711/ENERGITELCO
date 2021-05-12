<?php

namespace App\Models;

use App\Http\Controllers\retiredUserController;
use Illuminate\Database\Eloquent\Model;
use App\User;

class curriculum extends Model
{
    protected $table = "curricula";
    protected $fillable = ['responsable_id','approver_id','register_id','sst','has_familiary','name_r','parent','position_id_r','has_limitation','state','token'];

    public function responsable()
    {
        return $this->hasOne(User::class, 'id', 'responsable_id');
    }
   
    public function approver()
    {
        return $this->hasOne(User::class, 'id', 'approver_id');
    }
    
    public function register()
    {
        return $this->hasOne(Register::class, 'id', 'register_id');
    }
    
    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }

    public function position()
    {
        return $this->hasOne(Positions::class, 'id', 'position_id_r');
    }

    public function status_signature()
    {
        $documents = document::where('status','!=',3)->where('contract',1)->get();
        if($this->register){
            foreach ($documents as $item) {
                if($this->register->user && $this->register->user->signatures && count($this->register->user->signatures) == count($documents)){
                    return true;
                }
            }
        }
        return true;
    }

    public function expirationActive()
    {
        foreach($this->files as $item){
            if ($item->commentary && $item->commentary < now()){
                return true;
            }
        }
        return false;
    }
}
