<?php

namespace Tests\Mollie2\Api\Resources;

use Mollie2\Api\MollieApiClient;
use Mollie2\Api\Resources\Payment;
use Mollie2\Api\Resources\ResourceFactory;

class ResourceFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateFromApiResponseWorks()
    {
        $apiResult = json_decode('{
                   "resource":"payment",
                   "id":"tr_44aKxzEbr8",
                   "mode":"test",
                   "createdAt":"2018-03-13T14:02:29+00:00",
                   "amount":{  
                      "value":"20.00",
                      "currency":"EUR"
                   }
                }');

        $payment = ResourceFactory::createFromApiResult($apiResult, new Payment($this->createMock(MollieApiClient::class)));

        $this->assertInstanceOf(Payment::class, $payment);
        $this->assertEquals("payment", $payment->resource);
        $this->assertEquals("tr_44aKxzEbr8", $payment->id);
        $this->assertEquals("test", $payment->mode);
        $this->assertEquals("2018-03-13T14:02:29+00:00", $payment->createdAt);
        $this->assertEquals((object) ["value" => "20.00", "currency" => "EUR"], $payment->amount);
    }
}
