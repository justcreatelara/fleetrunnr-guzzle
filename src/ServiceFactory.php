<?php

namespace Jit\Fleetrunnr;
/**
 * Service factory class for API resources in the root namespace.
 *
 * @property Customer $customers
 */

class ServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'customers' => Customer::class
    ];

    public function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? new self::$classMap[$name] : null;
    }
}