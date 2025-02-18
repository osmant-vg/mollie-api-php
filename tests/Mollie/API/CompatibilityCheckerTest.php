<?php
namespace Tests\Mollie2\Api;

use \Mollie2\Api\CompatibilityChecker;

class CompatibilityCheckerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var CompatibilityChecker|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $checker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->checker = $this->getMockBuilder(CompatibilityChecker::class)
            ->setMethods([
                "satisfiesPhpVersion",
                "satisfiesJsonExtension",
            ])
            ->getMock();
    }

    public function testCheckCompatibilityThrowsExceptionOnPhpVersion()
    {
        $this->expectException(\Mollie2\Api\Exceptions\IncompatiblePlatform::class);
        $this->checker->expects($this->once())
            ->method("satisfiesPhpVersion")
            ->will($this->returnValue(false)); // Fail

        $this->checker->expects($this->never())
            ->method("satisfiesJsonExtension");

        $this->checker->checkCompatibility();
    }

    public function testCheckCompatibilityThrowsExceptionOnJsonExtension()
    {
        $this->expectException(\Mollie2\Api\Exceptions\IncompatiblePlatform::class);
        $this->checker->expects($this->once())
            ->method("satisfiesPhpVersion")
            ->will($this->returnValue(true));

        $this->checker->expects($this->once())
            ->method("satisfiesJsonExtension")
            ->will($this->returnValue(false)); // Fail

        $this->checker->checkCompatibility();
    }
}
