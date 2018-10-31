<?php

namespace App\Http\Controllers;

use App\Components\News\Service\NewsApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    /**
     * @var NewsApi
     */
    private $newsApi;

    /**
     * NewsController constructor.
     *
     * @param NewsApi $newsApi
     */
    public function __construct(NewsApi $newsApi)
    {
        $this->newsApi = $newsApi;
    }

    /**
     * Get news.
     *
     * @param Request $response
     * @return Request|mixed
     */
    public function newsApi(Request $response)
    {
        $response = Cache::remember('news', 1, function () use ($response) {
            return $this->newsApi->get($response->get('path'));
        });

        return $response;
    }
}
