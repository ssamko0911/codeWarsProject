<?php

declare(strict_types=1);

//https://www.codewars.com/kata/57d93721bfcdc5c92600014e/train/php

function hcf(int $numberOne, int $numberTwo): int
{
    $numberOne = abs($numberOne);
    $numberTwo = abs($numberTwo);

    while (0 !== $numberTwo) {
        $temp = $numberTwo;
        $numberTwo = $numberOne % $numberTwo;
        $numberOne = $temp;
    }

    return $numberOne;
}

function lcm(int $numberOne, int $numberTwo): string
{
    $numberOne = abs($numberOne);
    $numberTwo = abs($numberTwo);

    return strval($numberOne * $numberTwo / hcf($numberOne, $numberTwo));
}
