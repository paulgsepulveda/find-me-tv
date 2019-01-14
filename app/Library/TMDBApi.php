<?php

namespace App\Library;
use GuzzleHttp;

class TMDBApi {

    protected $basePath;
    protected $apiKey;

    public function __construct()
    {
        $this->basePath = 'https://api.themoviedb.org/3';
        $this->apiKey = env('TMDB_KEY');
    }

    public function sendRequest($endpoint, $params = false)
    {
        $query = $params;
        if($query) {
            $query= $query + ['api_key' => $this->apiKey];
        } else {
            $query = ['api_key' => $this->apiKey];
        }

        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', $this->basePath . $endpoint, [
            'verify' => false,
            'query' => $query
        ]);
        return $res->getBody();
    }

    public function getShow(int $show, $params = false)
    {
        $endpoint = "/tv/{$show}";

        if($params) {
            $params = $params + ['append_to_response' => 'credits'];
        } else {
            $params = ['append_to_response' => 'credits'];
        }

        return $this->sendRequest($endpoint, $params);
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

    public function discoverShow($params = null)
    {
        $endpoint = '/discover/tv';
        return $this->sendRequest($endpoint, $params);
    }



}