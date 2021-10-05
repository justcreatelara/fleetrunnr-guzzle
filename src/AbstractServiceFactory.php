<?php

namespace Jit\Fleetrunnr;

abstract class AbstractServiceFactory
{
    public function setGuzzle($guzzle)
    {
        $this->guzzle = $guzzle;
    }
}