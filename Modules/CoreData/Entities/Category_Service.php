<?php

namespace Modules\CoreData\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Category_Service extends Model
{
    use Sluggable;
    use SoftDeletes;
    protected $fillable = [
        'title_ar', 'title_en','order','status','slug','image','description_ar','description_en','service_id'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title_en'
            ]
        ];
    }
    public function service()
    {
        return $this->belongsTo('Modules\CoreData\Entities\Service','service_id');
    }
    protected $table = 'category_services';
    public $timestamps = true;

}