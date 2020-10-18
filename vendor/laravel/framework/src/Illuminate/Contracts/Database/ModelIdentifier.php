<?php

namespace Illuminate\Contracts\Database;

class ModelIdentifier
{
    /**
     * The class name of the modal.
     *
     * @var string
     */
    public $class;

    /**
     * The unique identifier of the modal.
     *
     * This may be either a single ID or an array of IDs.
     *
     * @var mixed
     */
    public $id;

    /**
     * The relationships loaded on the modal.
     *
     * @var array
     */
    public $relations;

    /**
     * The connection name of the modal.
     *
     * @var string|null
     */
    public $connection;

    /**
     * Create a new modal identifier.
     *
     * @param  string  $class
     * @param  mixed  $id
     * @param  array  $relations
     * @param  mixed  $connection
     * @return void
     */
    public function __construct($class, $id, array $relations, $connection)
    {
        $this->id = $id;
        $this->class = $class;
        $this->relations = $relations;
        $this->connection = $connection;
    }
}
