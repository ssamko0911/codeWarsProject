<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5552101f47fc5178b1000050/train/php

function digitPower(int $number, int $power): int
{
    $numberAsString = strval($number);

    $powers = getPowerValues($power, $numberAsString);

    $digitsRaised = [];
    for ($i = 0; $i < strlen($numberAsString); $i++) {
        $digitsRaised[] = pow(intval($numberAsString[$i]), $powers[$i]);
    }

    if (hasNumberMultiplier(array_sum($digitsRaised), $number)) {
        return array_sum($digitsRaised) / $number;
    }

    return -1;
}

/**
 * @param int $startingPow
 * @param string $number
 * @return int[]
 */
function getPowerValues(int $startingPow, string $number): array
{
    return range($startingPow, $startingPow + strlen($number));
}

function hasNumberMultiplier(int $sum, int $number): bool
{
    return $sum >= $number && $sum % $number === 0;
}
