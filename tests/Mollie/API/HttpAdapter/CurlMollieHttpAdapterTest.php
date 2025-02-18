<?php

namespace Tests\Mollie\API\HttpAdapter;

use Mollie2\Api\HttpAdapter\CurlMollieHttpAdapter;
use PHPUnit\Framework\TestCase;

class CurlMollieHttpAdapterTest extends TestCase
{
    /** @test */
    public function testDebuggingIsNotSupported()
    {
        $adapter = new CurlMollieHttpAdapter;
        $this->assertFalse($adapter->supportsDebugging());
    }
}
