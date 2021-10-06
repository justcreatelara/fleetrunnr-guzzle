<?php

namespace Jit\Fleetrunnr\Service;

use Exception;
use Jit\Fleetrunnr\Exceptions\FailedActionException;
use Jit\Fleetrunnr\Exceptions\NotFoundException;
use Jit\Fleetrunnr\Exceptions\ValidationException;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractServiceFactory
{
    public function setGuzzle($guzzle)
    {
        $this->guzzle = $guzzle;
    }

    protected function request($verb, $uri, array $payload = [])
    {
        $response = $this->guzzle->request($verb, $uri,
            empty($payload) ? [] : ['form_params' => $payload]
        );

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            $this->handleRequestError($response);
        }

        $responseBody = (string) $response->getBody();

        return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR) ?: $responseBody;
    }


    protected function handleRequestError(ResponseInterface $response)
    {
        if ($response->getStatusCode() === 422) {
            throw new ValidationException(json_decode((string)$response->getBody(), true, 512, JSON_THROW_ON_ERROR));
        }

        if ($response->getStatusCode() === 404) {
            throw new NotFoundException();
        }

        if ($response->getStatusCode() === 400) {
            throw new FailedActionException((string) $response->getBody());
        }

        throw new Exception((string) $response->getBody());
    }
}