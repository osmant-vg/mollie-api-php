<?php

namespace Mollie2\Api\HttpAdapter;

interface MollieHttpAdapterPickerInterface
{
    /**
     * @param \GuzzleHttp\ClientInterface|\Mollie2\Api\HttpAdapter\MollieHttpAdapterInterface $httpClient
     *
     * @return \Mollie2\Api\HttpAdapter\MollieHttpAdapterInterface
     */
    public function pickHttpAdapter($httpClient);
}
