<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Contact_Us extends Model
{
    use Sluggable;
    protected $fillable = [
        'address_ar','address_en','time_work_ar','time_work_en','latitude','longitude','phone','email','slug'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'email'
            ]
        ];
    }
    protected $table = 'contact_us';
    public $timestamps = true;

}