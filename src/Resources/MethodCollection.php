<?php

namespace Mollie2\Api\Resources;

class MethodCollection extends BaseCollection
{
    /**
     * @return string
     */
    public function getCollectionResourceName()
    {
        return "methods";
    }
}
