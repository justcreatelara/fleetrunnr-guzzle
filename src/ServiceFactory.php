<?php

namespace Jit\Fleetrunnr;
/**
 * Service factory class for API resources in the root namespace.
 *
 * @property Customer $customers
 * @property Location $locations
 */

class ServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'customers' => Customer::class,
        'locations' => Location::class,
    ];

    public function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? new self::$classMap[$name] : null;
    }
}