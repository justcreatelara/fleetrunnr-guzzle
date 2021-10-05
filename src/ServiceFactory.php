<?php

namespace Jit\Fleetrunnr;

class ServiceFactory
{
    private static $classMap = [
        'customers' => Customer::class
    ];

    public function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? new self::$classMap[$name] : null;
    }
}