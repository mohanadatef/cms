<?php namespace Cviebrock\EloquentSluggable\Tests\Models;

/**
 * Class PostWithNoSource
 *
 * A test modal with no source field defined.
 *
 * @package Cviebrock\EloquentSluggable\Tests\Models
 */
class PostWithNoSource extends Post
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
                'source' => null
            ]
        ];
    }
}
