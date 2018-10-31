<?php

namespace App\Components\News;

use App\Components\News\Contracts\News;
use App\Components\News\Service\NewsApi;
use Illuminate\Support\ServiceProvider;

class NewsProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(News::class, NewsApi::class);
    }
}
