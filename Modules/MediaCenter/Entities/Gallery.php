<?php

namespace Modules\MediaCenter\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Gallery extends Model
{
    use Sluggable;
    use SoftDeletes;
    protected $fillable = [
        'title_ar', 'title_en','image','order','status','slug'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title_en'
            ]
        ];
    }
    public function album()
    {
        return $this->hasMany('Modules\MediaCenter\Entities\Album');
    }
    protected $table = 'galleries';
    public $timestamps = true;
    public static function boot()
    {
        parent::boot();
        /**
         * Remove the branches
         * related to the deleted company.
         */
        Gallery::deleting(function($gallery)
        {
            $gallery->album()->delete();
        });
    }
}