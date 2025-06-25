<?php declare(strict_types=1);

//https://www.codewars.com/kata/58afce23b0e8046a960000eb/train/php

const NOTE_TWENTY = 20;
const NOTE_FIFTY = 50;
const NOTE_ONE_HUNDRED = 100;

const TWENTY_DIVISIBLE = [20, 40, 60, 80];
const FIFTY_DIVISIBLE_PLUS_TWENTY = [50, 70, 90];
const NON_DIVISIBLE = [10, 30];

/**
 * @param int $amount
 * @return int[]
 */
function withdraw(int $amount): array
{
    if ($amount % NOTE_ONE_HUNDRED === 0) {
        return [$amount / NOTE_ONE_HUNDRED, 0, 0];
    }

    $hundreds = intdiv($amount, NOTE_ONE_HUNDRED);
    $remainingAmount = $amount - $hundreds * NOTE_ONE_HUNDRED;

    if (in_array($remainingAmount, TWENTY_DIVISIBLE, true)) {
        return [$hundreds, 0, $remainingAmount / NOTE_TWENTY];
    }

    if (in_array($remainingAmount, FIFTY_DIVISIBLE_PLUS_TWENTY, true)) {
        return [$hundreds, 1, ($remainingAmount - NOTE_FIFTY) / NOTE_TWENTY];
    }

    if (in_array($remainingAmount, NON_DIVISIBLE, true)) {
        return [$hundreds - 1, 1, ($remainingAmount + NOTE_FIFTY) / NOTE_TWENTY];
    }

    return [0, 0, 0];
}
