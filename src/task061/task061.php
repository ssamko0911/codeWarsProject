<?php

declare(strict_types=1);

//https://www.codewars.com/kata/55bf01e5a717a0d57e0000ec/train/php

function persistence(int $number): int
{
    $count = 0;

    while (getNumberAsStringLength($number) !== 1) {
        $number = getProduct($number);
        $count++;
    }

    return $count;
}

function getNumberAsStringLength(int $number): int
{
    return strlen(strval($number));
}

function getProduct(int $number): int
{
    $digits = str_split(strval($number));

    return array_product($digits);
}

/* to have a look at the recursion example:
function persistence(int $num, int $result = 0): int
{
    return strlen($num) === 1? $result : persistence(array_product(str_split($num)), ++$result);
}
*/