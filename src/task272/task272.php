<?php declare(strict_types=1);

// https://www.codewars.com/kata/6167e70fc9bd9b00565ffa4e/train/php

const CLEANING_TIME = 2;

/**
 * @param int[] $coffees
 */
function barista(array $coffees): int
{
    $totalWaitingTime = 0;

    if ([] === $coffees) {
        return $totalWaitingTime;
    }

    sort($coffees, SORT_NUMERIC);

    $previousCustomerWaitingTime = $coffees[array_key_first($coffees)];
    $totalWaitingTime += $previousCustomerWaitingTime;

    $length = count($coffees);
    for ($i = 1; $i < $length; $i++) {
        $currentCustomerWaitingTime = $previousCustomerWaitingTime + $coffees[$i] + CLEANING_TIME;
        $totalWaitingTime += $currentCustomerWaitingTime;
        $previousCustomerWaitingTime = $currentCustomerWaitingTime;
    }

    return $totalWaitingTime;
}
