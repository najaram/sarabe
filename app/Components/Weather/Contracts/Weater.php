<?php

namespace App\Components\Weather\Contracts;

interface Weater
{
    /**
     * Get the weather.
     *
     * @param $url
     * @return mixed
     */
    public function request($url);
}
