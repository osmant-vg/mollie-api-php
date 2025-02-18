<?php

use Mollie2\Api\Types\PaymentTerm;
use Mollie2\Api\Types\SalesInvoiceStatus;

/*
 * Create a sales invoice using the Mollie API.
 */

try {
    /*
     * Initialize the Mollie API library with your API key or OAuth access token.
     */
    require "../initialize.php";

    /*
     * Create a sales invoice
     */
    $salesInvoice = $mollie->salesInvoices->create([
        'currency' => 'EUR',
        'status' => SalesInvoiceStatus::DRAFT,
        'vatScheme' => 'standard',
        'vatMode' => 'inclusive',
        'paymentTerm' => PaymentTerm::DAYS_30,
        'recipientIdentifier' => 'XXXXX',
        'recipient' => [
            'type' => 'consumer',
            'email' => 'darth@vader.deathstar',
            'streetAndNumber' => 'Sample Street 12b',
            'postalCode' => '2000 AA',
            'city' => 'Amsterdam',
            'country' => 'NL',
            'locale' => 'nl_NL',
        ],
        'lines' => [
            [
                'description' => 'Monthly subscription fee',
                'quantity' => 1,
                'vatRate' => '21',
                'unitPrice' => [
                    'currency' => 'EUR',
                    'value' => '10.00',  // Corrected the format from '10,00' to '10.00' to match typical API expectations
                ],
            ],
        ],
    ]);

    echo "<p>New sales invoice created with ID: " . htmlspecialchars($salesInvoice->id) . "</p>";
} catch (\Mollie2\Api\Exceptions\ApiException $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}
