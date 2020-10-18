<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Setting extends Model 
{
    use Sluggable;
    protected $fillable = [
        'image','facebook','youtube','twitter','logo','title_ar','title_en','slug'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title_en'
            ]
        ];
    }
    protected $table = 'settings';
    public $timestamps = true;

}