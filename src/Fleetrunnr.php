<?php

namespace Jit\Fleetrunnr;

use GuzzleHttp\Client as HttpClient;

class Fleetrunnr
{
    /**
     * The Fleetrunnr API Key.
     *
     * @var string
     */
    protected string $apiKey;

    /**
     * The Account Workspace.
     *
     * @var string
     */
    protected string $workspace;

    /**
     * The Guzzle HTTP Client instance.
     *
     * @var \GuzzleHttp\Client
     */
    public HttpClient $guzzle;

    /**
     * Create a new Fleetrunnr instance.
     *
     * @param  string|null  $apiKey
     * @param  \GuzzleHttp\Client|null  $guzzle
     * @return void
     */
    public function __construct($apiKey = null, $workspace = null, HttpClient $guzzle = null, )
    {
        if (! is_null($apiKey)) {
            $this->setApiKey($apiKey, $workspace, $guzzle);
        }

        if (! is_null($guzzle)) {
            $this->guzzle = $guzzle;
        }
    }

    /**
     * Set the api key and setup the guzzle request object.
     *
     * @param  string  $apiKey
     * @param  \GuzzleHttp\Client|null  $guzzle
     * @return $this
     */
    public function setApiKey($apiKey, $workspace, $guzzle = null)
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
