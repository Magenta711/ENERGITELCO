<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class PerformanceEvaluation extends Model
{
    protected $table = "performance_evaluations";
    protected $fillable = ['evaluator_id','approver_id','user_id','type_evaluation_id','estado','date','period','item_1','item_2','item_3','item_4','item_5','item_6','item_7','item_8','item_9','item_10','item_11','item_12','item_13','item_14','item_15','total_1','aspects','event','activity','training_needs','item_1_new','item_2_new','item_3_new','item_4_new','item_5_new','item_6_new','item_7_new','item_8_new','item_9_new','item_10_new','item_11_new','item_12_new','item_13_new','item_14_new','item_15_new','total','comments','state'];
    protected $guarder = ['id'];
    
    public function responsable()
    {
        return $this->hasOne(User::class, 'id', 'evaluator_id');
    }
    public function evaluado()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function aprobador()
    {
        return $this->hasOne(User::class, 'id', 'approver_id');
    }
}
