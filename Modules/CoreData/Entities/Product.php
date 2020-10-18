<?php

namespace Modules\CoreData\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
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
    public function item()
    {
        return $this->hasMany('Modules\CoreData\Entities\Item');
    }
    protected $table = 'products';
    public $timestamps = true;
    public static function boot()
    {
        parent::boot();

        /**
         * Remove the branches
         * related to the deleted company.
         */
        Product::deleting(function($product)
        {
            $product->item()->delete();
        });

    }
}