<?php

namespace Mollie2\Api\Resources;

class PermissionCollection extends BaseCollection
{
    /**
     * @return string
     */
    public function getCollectionResourceName()
    {
        return "permissions";
    }
}
