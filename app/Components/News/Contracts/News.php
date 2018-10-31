<?php

namespace App\Components\News\Contracts;

interface News
{
    /**
     * Get news
     *
     * @param string $path
     */
    public function get(string $path);
}
