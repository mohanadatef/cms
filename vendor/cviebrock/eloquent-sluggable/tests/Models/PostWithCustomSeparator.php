<?php namespace Cviebrock\EloquentSluggable\Tests\Models;

/**
 * Class PostWithCustomSeparator
 *
 * A test modal that uses a custom suffix generation method.
 *
 * @package Cviebrock\EloquentSluggable\Tests\Models
 */
class PostWithCustomSeparator extends Post
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
                'separator' => '.'
            ]
        ];
    }
}
