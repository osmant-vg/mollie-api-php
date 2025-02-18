<?php

namespace Tests\Mollie2\Api\Resources;

use Mollie2\Api\MollieApiClient;
use Mollie2\Api\Resources\IssuerCollection;
use Mollie2\Api\Resources\Method;
use PHPUnit\Framework\TestCase;

class MethodTest extends TestCase
{
    public function testIssuersNullWorks()
    {
        $method = new Method($this->createMock(MollieApiClient::class));
        $this->assertNull($method->issuers);

        $issuers = $method->issuers();

        $this->assertInstanceOf(IssuerCollection::class, $issuers);
        $this->assertCount(0, $issuers);
    }
}
