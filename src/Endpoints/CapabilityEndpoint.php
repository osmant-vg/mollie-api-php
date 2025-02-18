<?php

namespace Mollie2\Api\Endpoints;

use Mollie2\Api\Exceptions\ApiException;
use Mollie2\Api\Resources\Capability;
use Mollie2\Api\Resources\CapabilityCollection;

class CapabilityEndpoint extends CollectionEndpointAbstract
{
    protected $resourcePath = "capabilities";

    protected function getResourceCollectionObject($count, $_links)
    {
        return new CapabilityCollection($count, $_links);
    }

    protected function getResourceObject()
    {
        return new Capability($this->client);
    }

    /**
     * Retrieve a single capability from Mollie.
     *
     * @param string $name
     * @param array $parameters
     * @return \Mollie2\Api\Resources\Capability|\Mollie2\Api\Resources\BaseResource
     * @throws ApiException
     */
    public function get(string $name, array $parameters = [])
    {
        return parent::rest_read($name, $parameters);
    }

    /**
     * Retrieve all capabilities.
     *
     * @param array $parameters
     *
     * @return CapabilityCollection
     * @throws ApiException
     */
    public function all(array $parameters = [])
    {
        return parent::rest_list(null, null, $parameters);
    }
}
