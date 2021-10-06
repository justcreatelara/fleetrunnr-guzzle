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
    public function a_user_can_list_all_customers(): void
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
              'first_name' => 'aqq',
              'last_name' => 'qqq',
              'phone' => '9613442133',
              'email' => 'aaast@zfdfdfan.iafo',
              'notes' => 'Rem ut aliid quasi'
        ];

        $customers = $client->customers->create($data);

        self::assertCount(1, $customers['data']);
    }

    /** @test */
    public function a_user_can_update_a_customer()
    {
        $client = new FleetrunnrClient('6|Jl0V7whsu8F8rs20QK0jnORITLIWhM0maIzqWIJy', 'erdman-plc1633343483');

        $data = [
            'first_name' => 'skdfdfcd',
            'last_name' => 'cvdfdfb',
            'phone' => '9613334871',
            'email' => 'kekdfgt@zieerer.info',
            'notes' => 'Remdfgklfdugit aliquid sdsdsdsd'
        ];

        $customer = $client->customers->update(14, $data);

        self::assertEquals('Success', $customer['message']);
    }

    /** @test */
    public function a_user_can_delete_a_customer()
    {
        $client = new FleetrunnrClient('6|Jl0V7whsu8F8rs20QK0jnORITLIWhM0maIzqWIJy', 'erdman-plc1633343483');
        $customer = $client->customers->delete(15);
        self::assertCount(0, $customer['data']);
    }
}