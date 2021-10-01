<?php

namespace Jit\Fleetrunnr;

class Location
{
    use MakeHttpRequests;

    public function setGuzzle($guzzle): void
    {
        $this->guzzle = $guzzle;
    }

    public function all()
    {
        return $this->get('locations');
    }

    public function create($params = null)
    {
        return $this->request('post', 'locations', $params);
    }

    public function update($id, $params = null)
    {
        return $this->request('put', 'locations', $params);
    }

    public function delete($id)
    {
        return $this->request('delete', 'locations/$id');
    }
}