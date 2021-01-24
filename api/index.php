<?php

require "./utils/Validator.php";
require "./utils/prepareJsonResponse.php";

$iban = $_GET['iban'] ?? false;

if ($iban && Validator::validateIBAN($iban)) {
    $response = [
        'iban' => $iban,
        'countryISO' => Validator::getCountryISO($iban),
        'country' => Validator::getCountryName($iban),
        'valid' => Validator::validateIBAN($iban),
        'timestamp' => time(),
    ];
    
    prepareJsonResponse($response, true);
}else {
    $response = [
        'errors' => [
            'code' => 400,
            'iban' => $iban,
            'message' => "Please verify your IBAN and resubmit."
        ]
    ];

    prepareJsonResponse($response, false);
}
