<?php

namespace App\Library;
use GuzzleHttp;

class TMDBApi {

    protected $basePath;
    protected $apiKey;

    public function __construct()
    {
        $basePath = 'https://api.themoviedb.org/3/';
        $apiKey = env('TMDB_KEY');
    }

    public function sendRequest($endpoint, $params = false)
    {
        if($params) {
            array_push($params,['api_key' => $this->apiKey]);
        } else {
            $params = ['api_key' => $this->apiKey];
        }

        try {
            $client = new GuzzleHttp\Client(['base_uri' => $this->basePath]);
            $res = $client->request('GET', $endpoint, $params);
            return $res->getBody();
        } catch (\Throwable $th) {
            
        }
    }

    public function getShow(integer $show, $params = false)
    {
        if($params) {
            $endpoint = "tv/{$show}";
            return $this->sendRequest($endpoint, $params);
        } else {
            $endpoint = "tv/{$show}";
            return $this->sendRequest($endpoint);
        }
    }

    public function getSeason(integer $show, integer $season, $params = false)
    {
        if($params) {
            $endpoint = "tv/{$show}/season/{$season}";
            return $this->sendRequest($endpoint, $params);
        } else {
            $endpoint = "tv/{$show}/season/{$season}";
            return $this->sendRequest($endpoint);
        }
    }

    public function getEpisode(integer $show, integer $season, integer $episode, $params = false)
    {
        if($params) {
            $endpoint = "tv/{$show}/season/{$season}/episode/{$episode}";
            return $this->sendRequest($endpoint, $params);
        } else {
            $endpoint = "tv/{$show}/season/{$season}/episode/{$episode}";
            return $this->sendRequest($endpoint);
        }
    }

    public function discoverShow($params)
    {
        $endpoint = '/discover/tv';
        return $this->sendRequest($endpoint, $params);
    }



}