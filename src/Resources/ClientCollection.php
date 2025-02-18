<?php

namespace Mollie2\Api\Resources;

class ClientCollection extends CursorCollection
{
    /**
     * @return string
     */
    public function getCollectionResourceName()
    {
        return "clients";
    }

    /**
     * @return BaseResource
     */
    protected function createResourceObject()
    {
        return new Client($this->client);
    }
}
