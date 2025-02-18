<?php

namespace Mollie2\Api\Resources;

class TerminalCollection extends CursorCollection
{
    /**
     * @return string
     */
    public function getCollectionResourceName()
    {
        return "terminals";
    }

    /**
     * @return BaseResource
     */
    protected function createResourceObject()
    {
        return new Terminal($this->client);
    }
}
