<?php namespace Cviebrock\EloquentSluggable\Tests\Models;

/**
 * Class PostWithRelation
 *
 * A test modal used for the relationship tests.
 *
 * @package Cviebrock\EloquentSluggable\Tests\Models
 *
 * @property \Cviebrock\EloquentSluggable\Tests\Models\Author author
 */
class PostWithRelation extends Post
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
                'source' => ['author.name', 'title'],
            ]
        ];
    }

    /**
     * Relation to Author modal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
