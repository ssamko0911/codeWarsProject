<?php

declare(strict_types=1);

//https://www.codewars.com/kata/564057bc348c7200bd0000ff/train/php

const POW_BASE = 10;
const DIVISOR = 13;
const LIMIT = 100;

function thirt(int $number): int
{
    $reminders = getTenPowersReminders(strlen(strval($number)));

    $reversedNumber = getReversedNumber($number);

    $sum = getDigitsProductSum($reminders, $reversedNumber);

    return $sum < LIMIT ? $sum : thirt($sum);
}

/**
 * @param int $numberPlaces
 * @return int[]
 */
function getTenPowersReminders(int $numberPlaces): array
{
    $reminders = [];

    for ($i = 0; $i < $numberPlaces; $i++) {
        $reminders[] = pow(POW_BASE, $i) % DIVISOR;
    }

    return $reminders;
}

function getReversedNumber(int $number): string
{
    return strrev(strval($number));
}

/**
 * @param int[] $reminders
 * @param string $reversed
 * @return int
 */
function getDigitsProductSum(array $reminders, string $reversed): int
{
    return array_sum(
        array_map(function ($multiplicand, $multiplier) {
            return $multiplicand * $multiplier;
        }, str_split($reversed), $reminders)
    );
}
