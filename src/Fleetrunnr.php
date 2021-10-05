<?php

namespace Jit\Fleetrunnr;

use GuzzleHttp\Client as HttpClient;

class Fleetrunnr
{
    protected string $apiKey;
    protected string $workspace;
    public HttpClient $guzzle;

    public function __construct(string $apiKey = null, $workspace = null, HttpClient $guzzle = null)
    {
        if ($apiKey !== null) {
            $this->setApiKey($apiKey, $workspace, $guzzle);
        }

        if ($guzzle !== null) {
            $this->guzzle = $guzzle;
        }
    }

    public function setApiKey($apiKey, $workspace, HttpClient $guzzle = null)
    {
        $this->apiKey = $apiKey;
        $this->workspace = $workspace;

        $this->guzzle = $guzzle ?: new HttpClient([
            'base_uri' => 'http://'.$this->workspace.'.api.test/api/rest/',
            'http_errors' => false,
            'headers' => [
                'Authorization' => 'Bearer '.$this->apiKey,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        return $this;
    }
}
