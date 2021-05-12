<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = "materials";
    protected $fillable = ['description','project_type','place','hasLength','state'];
    protected $guarder = ['id'];

    public function consumables()
    {
        return $this->belongsToMany(Consumables::class, 'formula_materials', 'material_id', 'consumable_id');
    }

    public function project_types()
    {
        return $this->hasOne(ProjectType::class, 'id', 'project_type');
    }
    
    public function hasFormula($id)
    {
        return formulaMaterial::where('material_id',$this->id)->where('consumable_id',$id)->pluck('formula')->first();
    }

    public function assignConsumable($consumable,$formula)
    {
        ($this->consumables) ? formulaMaterial::where('material_id',$this->id)->delete() : '';
        for ($i=0; $i < count($consumable); $i++) {
            if ($consumable[$i] != '' || $consumable[$i] != Null) {
                formulaMaterial::create([
                    'material_id' => $this->id,
                    'consumable_id' => $consumable[$i],
                    'formula' => $formula[$i],
                ]);
            }
        }
    }

}
