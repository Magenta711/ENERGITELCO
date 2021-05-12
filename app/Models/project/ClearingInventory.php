<?php

namespace App\Models\project;

use App\Models\file;
use Illuminate\Database\Eloquent\Model;

class ClearingInventory extends Model
{
    protected $table = 'clearning_inventories';
    protected $fillable = ['clearing_id','name_element','code_material','type_active','station','serial_part'];
    protected $guarde = ['id'];

    public function file()
    {
        return $this->morphOne(file::class, 'fileble');
    }

    public function cliearing()
    {
        return $this->hasOne(Clearing::class, 'id','clearing_id');
    }
}
