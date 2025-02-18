<?php

namespace Mollie2\Api\Resources;

class CustomerCollection extends CursorCollection
{
    /**
     * @return string
     */
    public function getCollectionResourceName()
    {
        return "customers";
    }

    /**
     * @return BaseResource
     */
    protected function createResourceObject()
    {
        return new Customer($this->client);
    }
}
