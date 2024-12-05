<?php

declare(strict_types=1);

//https://www.codewars.com/kata/55d1d6d5955ec6365400006d/train/php

function roundToNextFive(int $number): int
{
    if ($number % 5 === 0) {
        return $number;
    } else if (abs($number) % 5 > 0) {
        return getNextFiveNumber($number);
    } else {
        return 0;
    }
}

function getNextFiveNumber(int $number): int
{
    while ($number % 5 !== 0) {
        $number++;
    }

    return $number;
}
