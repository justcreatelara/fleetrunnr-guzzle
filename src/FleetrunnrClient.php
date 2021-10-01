<?php

namespace Jit\Fleetrunnr;

class FleetrunnrClient extends Fleetrunnr
{
    /**
     * @var \Jit\Fleetrunnr\ServiceFactory
     */
    private $ServiceFactory;

    /**
     * Client used to send requests to FleetRunnr's API.
     *
     * @property \Jit\Fleetrunnr\Customer $customers
     * @property \Jit\Fleetrunnr\Location $locations
     */
    public function __get($name)
    {
        if (null === $this->ServiceFactory) {
            $this->ServiceFactory = new \Jit\Fleetrunnr\ServiceFactory($this);
        }

        $object = $this->ServiceFactory->getServiceClass($name);
        $object->setGuzzle($this->guzzle);
        return $object;
    }
}