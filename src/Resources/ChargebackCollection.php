<?php

namespace Mollie2\Api\Resources;

class ChargebackCollection extends CursorCollection
{
    /**
     * @return string
     */
    public function getCollectionResourceName()
    {
        return "chargebacks";
    }

    /**
     * @return BaseResource
     */
    protected function createResourceObject()
    {
        return new Chargeback($this->client);
    }
}
