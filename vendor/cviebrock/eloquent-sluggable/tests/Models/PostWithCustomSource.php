<?php namespace Cviebrock\EloquentSluggable\Tests\Models;

/**
 * Class PostWithCustomSource
 *
 * A test modal that uses a custom suffix generation method.
 *
 * @package Cviebrock\EloquentSluggable\Tests\Models
 */
class PostWithCustomSource extends Post
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
                'source' => 'subtitle'
            ]
        ];
    }
}
