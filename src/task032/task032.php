<?php

declare(strict_types=1);

//https://www.codewars.com/kata/59b401e24f98a813f9000026/train/php

const ARRAY_LENGTH_LIMIT = 10;

function computeDepth(int $number): int
{
    $countDepth = 0;
    $digits = [];

    while (count($digits) !== ARRAY_LENGTH_LIMIT) {
        $product = $number * getMultiplier($countDepth);
        $productDigits = getAllDigits($product);
        checkAllDigits($productDigits, $digits);
        $countDepth++;
    }

    return $countDepth - 1;
}

function getMultiplier($number): int
{
    return $number === 0 ? $number + 1 : $number;
}

/**
 * @param int $number
 * @return string[]
 */
function getAllDigits(int $number): array
{
    return str_split(strval($number));
}

/**
 * @param string $digit
 * @param string[] $digits
 * @return bool
 */
function saveDigitAsChecked(string $digit, array &$digits): bool
{
    if (!in_array($digit, $digits)) {
        $digits[] = $digit;

        return true;
    }

    return false;
}

/**
 * @param string[] $numberDigits
 * @param string[] $digits
 * @return void
 */
function checkAllDigits(array $numberDigits, array &$digits): void
{
    foreach ($numberDigits as $digit) {
        saveDigitAsChecked($digit, $digits);
    }
}
