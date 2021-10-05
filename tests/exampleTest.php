<?php

namespace Jit\Fleetrunnr\Tests;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Jit\Fleetrunnr\FleetrunnrClient;
use Orchestra\Testbench\TestCase;

class exampleTest extends TestCase
{
    /** @test */
    public function a_user_can_list_all_customers()
    {
        $mock = new MockHandler([
            new Response(200, ['base_uri' => 'http://erdman-plc1633343483.api.test/api/rest/'])
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new FleetrunnrClient('6|Jl0V7whsu8F8rs20QK0jnORITLIWhM0maIzqWIJy', 'erdman-plc1633343483');
        $client->guzzle->handler = $handlerStack;

        $response = $client->customers->list();

        self::assertEquals('Success', $response['message']);
    }

    /** @test */
    public function a_user_can_create_a_customer()
    {
        $client = new FleetrunnrClient('6|Jl0V7whsu8F8rs20QK0jnORITLIWhM0maIzqWIJy', 'erdman-plc1633343483');
        $data = [
              "first_name" => "aqq",
              "last_name" => "qqq",
              "phone" => "9613442322",
              "email" => "aaasfgft@zfdfan.iafo",
              "notes" => "Rem ut aliid quasi"
        ];

        $customers = $client->customers->create($data);

        self::assertCount(1, $customers['data']);
    }

    /** @test */
    public function a_user_can_update_a_customer()
    {
        $client = new FleetrunnrClient('6|Jl0V7whsu8F8rs20QK0jnORITLIWhM0maIzqWIJy', 'erdman-plc1633343483');

        $data = [
            "first_name" => "sasd",
            "last_name" => "bb",
            "phone" => "9611335871",
            "email" => "kekfft@zieerer.info",
            "notes" => "Rem ut fsklfdugit aliquid sdsdsdsd"
        ];

        $customer = $client->customers->update(12, $data);

        self::assertEquals('Success', $customer['message']);
    }

    /** @test */
    public function a_user_can_delete_a_customer()
    {
        $client = new FleetrunnrClient('6|Jl0V7whsu8F8rs20QK0jnORITLIWhM0maIzqWIJy', 'erdman-plc1633343483');
        $customer = $client->customers->delete(12);
        self::assertCount(0, $customer['data']);
    }
}