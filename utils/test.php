<?php

require "./Validator.php";

$iban = $_POST['iban'] ?? false;

if ($iban) {
    echo validateIBAN($iban) ? "VALID" : "INVALID";
} else {
    echo "INVALID";
}