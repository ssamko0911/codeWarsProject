<?php

declare(strict_types=1);

//https://www.codewars.com/kata/56af1a20509ce5b9b000001e/train/php

const ZIP_CODE_LENGTH = 8;

function travel(string $address, string $zipcode): string
{
    $addressList = explode(',', $address);
    $streetNumbers = [];
    $streetNames = [];

    foreach ($addressList as $address) {
        if (str_contains($address, $zipcode) && strlen($zipcode) === ZIP_CODE_LENGTH) {
            $address = str_replace($zipcode, '', $address);
            $streetNumber = preg_replace("/[^0-9]/", '', $address);
            $streetNumbers[] = $streetNumber;
            $streetName = trim(str_replace($streetNumber, '', $address));
            $streetNames[] = $streetName;
        }
    }

    if ([] === $streetNumbers) {
        return sprintf("%s:/", $zipcode);
    }

    return getAddressesAsString($streetNumbers, $streetNames, $zipcode);
}

/**
 * @param string[] $streetNumbers
 * @param string[] $streetNames
 * @param string $zipcode
 * @return string
 */
function getAddressesAsString(array $streetNumbers, array $streetNames, string $zipcode): string
{
    $streetNumbersToString = implode(',', $streetNumbers);
    $streetNamesToString = implode(',', $streetNames);

    return sprintf("%s:/%s/%s", $zipcode, $streetNamesToString, $streetNumbersToString);
}
