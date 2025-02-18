<?php

namespace Mollie2\Api\Resources;

class CaptureCollection extends CursorCollection
{
    /**
     * @return string
     */
    public function getCollectionResourceName()
    {
        return "captures";
    }

    /**
     * @return BaseResource
     */
    protected function createResourceObject()
    {
        return new Capture($this->client);
    }
}
