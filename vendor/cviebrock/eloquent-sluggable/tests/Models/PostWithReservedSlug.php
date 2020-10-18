<?php namespace Cviebrock\EloquentSluggable\Tests\Models;

/**
 * Class PostWithReservedSlug
 *
 * A test modal that uses custom reserved slug names.
 *
 * @package Cviebrock\EloquentSluggable\Tests\Models
 */
class PostWithReservedSlug extends Post
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
                'reserved' => ['add','add-1']
            ]
        ];
    }
}
