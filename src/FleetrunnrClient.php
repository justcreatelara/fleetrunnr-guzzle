<?php

namespace Jit\Fleetrunnr;

class FleetrunnrClient extends Fleetrunnr
{
    private $ServiceFactory;

    public function __get($name)
    {
        if ($this->ServiceFactory === null) {
            $this->ServiceFactory = new ServiceFactory($this);
        }

        $object = $this->ServiceFactory->getServiceClass($name);

        $object->setGuzzle($this->guzzle);
        return $object;
    }
}