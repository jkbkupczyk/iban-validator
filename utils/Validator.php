<?php

function validateIBAN($iban): bool
{
    $iban = strtoupper(preg_replace("/\s/", '', $iban));
    //$iban = strtoupper(str_replace(' ', '', $iban));

    $codeLengths = require_once "./countries.php";
    $countryCode = substr($iban, 0, 2);

    if (array_key_exists($countryCode, $codeLengths) && strlen($iban) == $codeLengths[$countryCode]) {
        $codeCheckSum = substr($iban, 2, 2);
        $letters = require_once "./letters.php";

        $iban = str_replace($codeCheckSum, '00', $iban);
        $iban = str_split(substr($iban, 4) . substr($iban, 0, 4));
        $newIban = "";

        foreach ($iban as $char) {
            if (array_key_exists($char, $letters)) {
                $char = $letters[$char];
            }

            $newIban .= $char;
        }

        $checksum = intval(substr($newIban, 0, 1));
        for ($i = 1; $i < strlen($newIban); $i++) {
            $checksum *= 10;
            $checksum += intval(substr($newIban, $i, 1));
            $checksum %= 97;
        }

        if ($codeCheckSum == 98 - $checksum) {
            return true;
        }
    }

    return false;
}
