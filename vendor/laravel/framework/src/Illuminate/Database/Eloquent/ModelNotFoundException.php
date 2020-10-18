<?php

namespace Illuminate\Database\Eloquent;

use RuntimeException;
use Illuminate\Support\Arr;

class ModelNotFoundException extends RuntimeException
{
    /**
     * Name of the affected Eloquent modal.
     *
     * @var string
     */
    protected $model;

    /**
     * The affected modal IDs.
     *
     * @var int|array
     */
    protected $ids;

    /**
     * Set the affected Eloquent modal and instance ids.
     *
     * @param  string  $model
     * @param  int|array  $ids
     * @return $this
     */
    public function setModel($model, $ids = [])
    {
        $this->model = $model;
        $this->ids = Arr::wrap($ids);

        $this->message = "No query results for modal [{$model}]";

        if (count($this->ids) > 0) {
            $this->message .= ' '.implode(', ', $this->ids);
        } else {
            $this->message .= '.';
        }

        return $this;
    }

    /**
     * Get the affected Eloquent modal.
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get the affected Eloquent modal IDs.
     *
     * @return int|array
     */
    public function getIds()
    {
        return $this->ids;
    }
}
