<?php

namespace Modules\CoreData\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Service extends Model
{
    use Sluggable;
    use SoftDeletes;
    protected $fillable = [
        'title_ar', 'title_en','order','status','slug'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title_en'
            ]
        ];
    }
    public function category_service()
    {
        return $this->hasMany('Modules\CoreData\Entities\Category_service');
    }
    protected $table = 'services';
    public $timestamps = true;
    public static function boot()
    {
        parent::boot();

        /**
         * Remove the branches
         * related to the deleted company.
         */
        Service::deleting(function($service)
        {
            $service->category_service()->delete();
        });

    }
}