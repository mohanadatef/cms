<?php

namespace Modules\MediaCenter\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Album extends Model
{
    use Sluggable;
    use SoftDeletes;
    protected $fillable = [
        'title_ar', 'title_en','image','order','status','slug','gallery_id'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title_en'
            ]
        ];
    }
    public function gallery()
    {
        return $this->belongsTo('Modules\MediaCenter\Entities\Gallery','gallery_id');
    }
    protected $table = 'albums';
    public $timestamps = true;

}