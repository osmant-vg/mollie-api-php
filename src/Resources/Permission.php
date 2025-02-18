<?php

namespace Mollie2\Api\Resources;

class Permission extends BaseResource
{
    /**
     * @var string
     * @example payments.read
     */
    public $id;

    /**
     * @var string
     */
    public $description;

    /**
     * @var bool
     */
    public $granted;

    /**
     * @var \stdClass
     */
    public $_links;
}
