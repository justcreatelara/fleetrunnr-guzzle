<?php

namespace Jit\Fleetrunnr;

use GuzzleHttp\Client as HttpClient;

class Fleetrunnr
{
    const URI_BASE = 'http://';
    const URI_LAT =  '.api.test/api/rest/';

    public HttpClient $guzzle;

    public function __construct(string $apiKey, $workspace)
    {
        $this->setApiKey($apiKey, $workspace);
    }

    private function setApiKey($apiKey, $workspace)
    {
        $this->guzzle = new HttpClient([
            'base_uri' => self::URI_BASE .$workspace. self::URI_LAT,
            'http_errors' => false,
            'headers' => [
                'Authorization' => 'Bearer '.$apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
        return $this;
    }
}
