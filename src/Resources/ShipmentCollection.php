<?php

namespace Mollie2\Api\Resources;

class ShipmentCollection extends BaseCollection
{
    /**
     * @return string
     */
    public function getCollectionResourceName()
    {
        return 'shipments';
    }
}
