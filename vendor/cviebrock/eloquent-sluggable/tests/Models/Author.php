<?php namespace Cviebrock\EloquentSluggable\Tests\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Author
 *
 * A test modal used for the relationship tests.
 *
 * @package Cviebrock\EloquentSluggable\Tests\Models
 *
 * @property integer id
 * @property string name
 */
class Author extends Model
{

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
    protected $fillable = ['name'];
}
