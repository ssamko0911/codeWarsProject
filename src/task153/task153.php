<?php

declare(strict_types = 1);

//https://www.codewars.com/kata/56445c4755d0e45b8c00010a/train/php

function fortune(int $deposit, int $percentRate, int $livingCost, int $years, int $inflationRate ): bool
{
    $totalSavings = $deposit;
    $annualLivingCost = $livingCost;

    for ($i = 0; $i < $years; $i++) {
        if (0 > $totalSavings) {
            return false;
        } else {
            $depositEarnings = getDepositEarnings($totalSavings, $percentRate);
            $annualLivingCost = getLivingCostWithInflation($annualLivingCost, $inflationRate, $i);
            $totalSavings = $totalSavings + $depositEarnings - $annualLivingCost;
        }
    }

    return true;
}

function getLivingCostWithInflation(int $livingCost, int $inflation, int $year): int
{
    if (0 === $year) {
        return $livingCost;
    }

    return (int) ($inflation * $livingCost / 100) + $livingCost;
}

function getDepositEarnings(int $deposit, int $percentRate): int
{
    return (int) ($deposit * $percentRate / 100);
}
