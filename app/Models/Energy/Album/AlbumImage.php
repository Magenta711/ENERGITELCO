<?php

namespace App\Models\Energy\Album;

use Illuminate\Database\Eloquent\Model;

class AlbumImage extends Model
{
    protected $fillable = [
        'project_real_id',
        'image',
        'type'
    ];

    public function project()
    {
        return $this->belongsTo(AlbumProject::class, 'project_real_id');
    }
}
