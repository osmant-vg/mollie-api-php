<?php
namespace Mollie2\Api\Idempotency;

interface IdempotencyKeyGeneratorContract
{
    public function generate();
}
