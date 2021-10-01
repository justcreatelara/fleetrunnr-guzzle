<?php

namespace Jit\Fleetrunnr\Tests;

use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Jit\Fleetrunnr\Fleetrunnr1;
use Jit\Fleetrunnr\FleetrunnrClient;
use Mockery;
use Orchestra\Testbench\TestCase;

class exampleTest extends TestCase
{
    /** @test */
    public function aa_sdk()
    {
        $client = new FleetrunnrClient('token');

        $customer = $client->customers->list();
    }
}