<?php

namespace App\Components\Weather\Service;

use App\Components\Weather\Contracts\Weater;
use GuzzleHttp\Client;

class DarkSky implements Weater
{
    /**
     * @var string
     */
    private $lat;

    /**
     * @var string
     */
    private $lng;

    /**
     * @var string
     */
    private $key;

    /**
     * DarkSky constructor.
     *
     * @param $lat
     * @param $lng
     */
    public function __construct($lat, $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
        $this->key = env('DARK_SKY_API_KEY');
    }

    /**
     * {@inheritdoc}
     */
    public function request($url)
    {
        return json_decode((new Client())->get($url)->getBody(), true);
    }

    /**
     * Returns forecast.
     *
     * @return mixed
     */
    public function forecast()
    {
        return $this->request($this->url());
    }

    /**
     * Display the url.
     *
     * @return \Exception|string
     */
    protected function url()
    {
        $latitude = $this->lat;
        $longitude = $this->lng;

        $uri = collect([$latitude, $longitude])->filter()->implode(',');

        return "https://api.darksky.net/forecast/{$this->key}/{$uri}";
    }
}
