<?php

namespace Mollie2\Api\Resources;

class CapabilityCollection extends BaseCollection
{
    /**
     * @return string
     */
    public function getCollectionResourceName()
    {
        return "capabilities";
    }
}
