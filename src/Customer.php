<?php

namespace Jit\Fleetrunnr;

class Customer extends AbstractServiceFactory
{
    use MakeHttpRequests;

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