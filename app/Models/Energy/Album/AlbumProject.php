<?php

namespace App\Models\Energy\Album;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AlbumProject extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'location',
        'project_date',
        'cover_image',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            $project->slug = Str::slug($project->name);
        });
    }

    public function images()
    {
        return $this->hasMany(AlbumImage::class, 'project_real_id');
    }
}
