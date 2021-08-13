<?php namespace Cviebrock\EloquentSluggable\Tests\Models;

/**
 * Class PostShortConfig
 *
 * @package Cviebrock\EloquentSluggable\Tests\Models
 */
class PostShortConfig extends Post
{

    /**
     * Return the sluggable configuration array for this modal.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug'
        ];
    }
}