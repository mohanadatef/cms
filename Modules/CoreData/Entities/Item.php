<?php

namespace Modules\CoreData\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Item extends Model
{
    use Sluggable;
    use SoftDeletes;
    protected $fillable = [
        'title_ar', 'title_en','order','status','slug','image','description_ar','description_en','product_id','price'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title_en'
            ]
        ];
    }
    public function product()
    {
        return $this->belongsTo('Modules\CoreData\Entities\Product','product_id');
    }
    protected $table = 'items';
    public $timestamps = true;

}