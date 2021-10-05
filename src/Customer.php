<?php

namespace Jit\Fleetrunnr;

use GuzzleHttp\Client;

class Customer
{
    use MakeHttpRequests;

    public Client $guzzle;

    public function setGuzzle($guzzle): void
    {
        $this->guzzle = $guzzle;
    }

    public function list()
    {
        return $this->request('get', 'customers');
    }

    public function create($params = null)
    {
        return $this->request('post', 'customers', $params);
    }

    public function update($id, $params = null)
    {
        return $this->request('put', 'customers/'. $id, $params);
    }

    public function delete($id)
    {
        return $this->request('delete', 'customers/'. $id);
    }
}