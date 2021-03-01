<?php

namespace App\Contracts;

interface Tracker
{
    /**
     * Validate and track a resource.
     *
     * @param  array  $input
     * @return mixed
     */
    public function track(array $input);
}
