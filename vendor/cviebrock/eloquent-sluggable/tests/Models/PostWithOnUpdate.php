<?php namespace Cviebrock\EloquentSluggable\Tests\Models;

/**
 * Class PostWithOnUpdate
 *
 * A test modal that uses the onUpdate functionality.
 *
 * @package Cviebrock\EloquentSluggable\Tests\Models
 */
class PostWithOnUpdate extends Post
{

    /**
     * Return the sluggable configuration array for this modal.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }
}
