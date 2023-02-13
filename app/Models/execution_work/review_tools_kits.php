<?php


namespace App\Models\execution_work;
use Illuminate\Database\Eloquent\Model;
use App\User;

class review_tools_kits extends Model
{
    protected $table = "review_tools_kits";
    protected $fillable = [
    'id_review',
    'id_kit',
    'id_tool',
    'estado',
    'comentario',
    ];
    public function revision()
        {
            return $this->hasOne(review_kits::class, 'id_review','id_kit');

        }
    public function revision_tool()
        {
            return $this->hasOne(tools::class, 'id','id_tool');

        }

}
