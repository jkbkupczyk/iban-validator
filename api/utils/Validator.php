<?php

define("COUNTRIES_ARR", require_once "IbanAlphaCodes/countries.php");
define("COUNTRY_IBAN_LENGTH", require_once "IbanAlphaCodes/countryCodes.php");
define("CHARACTER_VAL_ARR", require_once "IbanAlphaCodes/letterValues.php");

class Validator
{
    public static function getCountryISO($iban): string
    {
        return substr($iban, 0, 2);
    }

    public static function getCountryName($iban): string
    {
        return COUNTRIES_ARR[substr($iban, 0, 2)];
    }

    public static function validateIBAN($iban): bool
    {
        // $iban = strtoupper(preg_replace("/\s/", '', $iban));
        $iban = strtoupper(str_replace(' ', '', $iban));
        $countryCode = substr($iban, 0, 2);

        if (
            is_array(COUNTRY_IBAN_LENGTH)
            && array_key_exists($countryCode, COUNTRY_IBAN_LENGTH)
            && strlen($iban) == COUNTRY_IBAN_LENGTH[$countryCode]
        ) {
            $codeCheckSum = substr($iban, 2, 2);

            $iban = str_replace($codeCheckSum, '00', $iban);
            $iban = str_split(substr($iban, 4) . substr($iban, 0, 4));
            $newIban = "";

            foreach ($iban as $char) {
                if (is_array(CHARACTER_VAL_ARR) && array_key_exists($char, CHARACTER_VAL_ARR)) {
                    $char = CHARACTER_VAL_ARR[$char];
                }

                $newIban .= $char;
            }

            $checksum = intval(substr($newIban, 0, 1));
            for ($i = 1; $i < strlen($newIban); $i++) {
                $checksum *= 10;
                $checksum += intval(substr($newIban, $i, 1));
                $checksum %= 97;
            }

            return $codeCheckSum == 98 - $checksum ? true : false;
        }

        return false;
    }
}
