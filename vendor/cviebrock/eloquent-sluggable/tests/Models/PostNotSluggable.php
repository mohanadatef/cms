<?php namespace Cviebrock\EloquentSluggable\Tests\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PostNotSluggable
 *
 * A test modal that doesn't use the Sluggable package.
 *
 * @package Cviebrock\EloquentSluggable\Tests\Models
 */
class PostNotSluggable extends Model
{

    /**
     * The table associated with the modal.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Indicates if the modal should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'subtitle'];

    /**
     * Convert the modal to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }
}
