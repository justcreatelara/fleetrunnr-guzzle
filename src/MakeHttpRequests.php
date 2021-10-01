<?php

namespace Jit\Fleetrunnr;

use Exception;
use Jit\Fleetrunnr\Exceptions\FailedActionException;
use Jit\Fleetrunnr\Exceptions\NotFoundException;
use Jit\Fleetrunnr\Exceptions\ValidationException;
use Psr\Http\Message\ResponseInterface;

trait MakeHttpRequests
{
    public function get($uri)
    {
        return $this->request('GET', $uri);
    }

    public function post($uri, array $payload = [])
    {
        return $this->request('POST', $uri, $payload);
    }

    public function put($uri, array $payload = [])
    {
        return $this->request('PUT', $uri, $payload);
    }

    public function delete($uri)
    {
        return $this->request('DELETE', $uri);
    }

    protected function request($verb, $uri, array $payload = [])
    {
        $response = $this->guzzle->request($verb, $uri,
            empty($payload) ? [] : ['form_params' => $payload]
        );

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            return $this->handleRequestError($response);
        }

        $responseBody = (string) $response->getBody();

        return json_decode($responseBody, true) ?: $responseBody;
    }

    protected function handleRequestError(ResponseInterface $response)
    {
        if ($response->getStatusCode() == 422) {
            throw new ValidationException(json_decode((string) $response->getBody(), true));
        }

        if ($response->getStatusCode() == 404) {
            throw new NotFoundException();
        }

        if ($response->getStatusCode() == 400) {
            throw new FailedActionException((string) $response->getBody());
        }

        throw new Exception((string) $response->getBody());
    }
}