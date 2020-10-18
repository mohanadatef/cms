<?php

namespace Modules\MediaCenter\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    use Sluggable;
    use SoftDeletes;
    protected $fillable = [
        'title_ar', 'title_en','description_ar','description_en','image','order','status','slug'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title_en'
            ]
        ];
    }
    protected $table = 'news';
    public $timestamps = true;

}