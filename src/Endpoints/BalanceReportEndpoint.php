<?php

declare(strict_types=1);

namespace Mollie2\Api\Endpoints;

use Mollie2\Api\Resources\Balance;
use Mollie2\Api\Resources\BalanceReport;
use Mollie2\Api\Resources\ResourceFactory;

class BalanceReportEndpoint extends EndpointAbstract
{
    protected $resourcePath = "balances_report";

    /**
     * @inheritDoc
     */
    protected function getResourceObject()
    {
        return new BalanceReport($this->client);
    }

    /**
     * Retrieve a balance report for the provided balance id and parameters.
     *
     * @param string $balanceId
     * @param array $parameters
     * @return \Mollie2\Api\Resources\BalanceReport|\Mollie2\Api\Resources\BaseResource
     * @throws \Mollie2\Api\Exceptions\ApiException
     */
    public function getForId(string $balanceId, array $parameters = [])
    {
        $this->parentId = $balanceId;

        $result = $this->client->performHttpCall(
            self::REST_READ,
            $this->getResourcePath() . $this->buildQueryString($parameters)
        );

        return ResourceFactory::createFromApiResult($result, $this->getResourceObject());
    }

    /**
     * Retrieve the primary balance.
     * This is the balance of your account’s primary currency, where all payments are settled to by default.
     *
     * @param array $parameters
     * @return \Mollie2\Api\Resources\BalanceReport|\Mollie2\Api\Resources\BaseResource
     * @throws \Mollie2\Api\Exceptions\ApiException
     */
    public function getForPrimary(array $parameters = [])
    {
        return $this->getForId("primary", $parameters);
    }


    /**
     * Retrieve a balance report for the provided balance resource and parameters.
     *
     * @param \Mollie2\Api\Resources\Balance $balance
     * @param array $parameters
     * @return \Mollie2\Api\Resources\BalanceReport|\Mollie2\Api\Resources\BaseResource
     * @throws \Mollie2\Api\Exceptions\ApiException
     */
    public function getFor(Balance $balance, array $parameters = [])
    {
        return $this->getForId($balance->id, $parameters);
    }
}
