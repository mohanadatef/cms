<?php

namespace Illuminate\Contracts\Routing;

interface UrlRoutable
{
    /**
     * Get the value of the modal's route key.
     *
     * @return mixed
     */
    public function getRouteKey();

    /**
     * Get the route key for the modal.
     *
     * @return string
     */
    public function getRouteKeyName();

    /**
     * Retrieve the modal for a bound value.
     *
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value);
}
