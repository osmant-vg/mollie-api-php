<?php

namespace Mollie2\Api\Endpoints;

use Mollie2\Api\Resources\Order;
use Mollie2\Api\Resources\Refund;
use Mollie2\Api\Resources\RefundCollection;

class OrderRefundEndpoint extends CollectionEndpointAbstract
{
    protected $resourcePath = "orders_refunds";

    /**
     * Get the object that is used by this API endpoint. Every API endpoint uses one type of object.
     *
     * @return Refund
     */
    protected function getResourceObject()
    {
        return new Refund($this->client);
    }

    /**
     * Get the collection object that is used by this API endpoint. Every API endpoint uses one type of collection object.
     *
     * @param int $count
     * @param \stdClass $_links
     *
     * @return RefundCollection
     */
    protected function getResourceCollectionObject($count, $_links)
    {
        return new RefundCollection($this->client, $count, $_links);
    }

    /**
     * Refund some order lines. You can provide an empty array for the
     * "lines" data to refund all eligible lines for this order.
     *
     * @param Order $order
     * @param array $data
     * @param array $filters
     *
     * @return Refund
     * @throws \Mollie2\Api\Exceptions\ApiException
     */
    public function createFor(Order $order, array $data, array $filters = [])
    {
        return $this->createForId($order->id, $data, $filters);
    }

    /**
     * Refund some order lines. You can provide an empty array for the
     * "lines" data to refund all eligible lines for this order.
     *
     * @param string $orderId
     * @param array $data
     * @param array $filters
     *
     * @return \Mollie2\Api\Resources\Refund
     * @throws \Mollie2\Api\Exceptions\ApiException
     */
    public function createForId($orderId, array $data, array $filters = [])
    {
        $this->parentId = $orderId;

        return parent::rest_create($data, $filters);
    }

    /**
     * @param $orderId
     * @param array $parameters
     * @return RefundCollection
     * @throws \Mollie2\Api\Exceptions\ApiException
     */
    public function pageForId($orderId, array $parameters = [])
    {
        $this->parentId = $orderId;

        return parent::rest_list(null, null, $parameters);
    }

    /**
     * @param \Mollie2\Api\Resources\Order $order
     * @param array $parameters
     * @return \Mollie2\Api\Resources\RefundCollection
     * @throws \Mollie2\Api\Exceptions\ApiException
     */
    public function pageFor(Order $order, array $parameters = [])
    {
        return $this->pageForId($order->id, $parameters);
    }
}
