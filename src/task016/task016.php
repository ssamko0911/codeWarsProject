<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5679aa472b8f57fb8c000047/php

const ZERO_CHARACTER = '0';

function getExpandedForm(int $number): string
{
    $numberAsString = strval($number);

    $numberExpandedForm = '';

    for ($i = 0; $i < strlen($numberAsString); $i++) {
        if ($numberAsString[$i] !== ZERO_CHARACTER) {
            $numberExpandedForm .= getNumberFromPlaceDigit($i, $numberAsString);
        }
    }

    return rtrim($numberExpandedForm, ' +');
}

function getNumberFromPlaceDigit(int $digitIndex, string $digit): string
{
    $zeroQuantity = strlen($digit) - $digitIndex - 1;
    $numberZeroes = str_repeat(ZERO_CHARACTER, $zeroQuantity);
    $number = $digit[$digitIndex].$numberZeroes;

    return sprintf('%d + ', $number);
}
