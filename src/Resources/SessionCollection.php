<?php

namespace Mollie2\Api\Resources;

class SessionCollection extends CursorCollection
{
    /**
     * @return string
     */
    public function getCollectionResourceName()
    {
        return "sessions";
    }

    /**
     * @return BaseResource
     */
    protected function createResourceObject()
    {
        return new Session($this->client);
    }
}
