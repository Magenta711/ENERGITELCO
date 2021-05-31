<?php

namespace App\Models\autoForm;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = [
        'form_id','number','question','required','type','status','value_question','max_file','description_question'
    ];
    
    public function options()
    {
        return $this->hasMany(detail_question::class, 'question_id', 'id');
    }
}
