<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class About_Us extends Model
{
    use Sluggable;
    protected $fillable = [
        'description_ar','description_en','image','title_ar','title_en','slug'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title_en'
            ]
        ];
    }
    protected $table = 'about_us';
    public $timestamps = true;

}