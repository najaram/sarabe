<?php

namespace App\Components\News\Service;

use App\Components\News\Contracts\News as NewsContract;
use GuzzleHttp\Client;

class NewsApi implements NewsContract
{
    /**
     * @var string
     */
    public $baseUri = 'https://newsapi.org/v2/';

    /**
     * {@inheritdoc}
     */
    public function get(string $path)
    {
        $client = new Client(['base_uri' => $this->baseUri]);

        $response = $client->request('GET', $path . '&pageSize=5&apiKey=' . env('NEWS_API_KEY'));
        $body = json_decode($response->getBody(), true);

        return $body;
    }
}
