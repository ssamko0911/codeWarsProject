<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5517fcb0236c8826940003c9/train/php

/**
 * @param array<int, int[]> $listOfArrays
 * @return int[]|int|null
 */
function sumFractions(array $listOfArrays): array|int|null
{
    if ([] === $listOfArrays) {
        return null;
    }

    $sum = getFirstFraction($listOfArrays);

    for ($i = 1; $i < count($listOfArrays); $i++) {
        $sum = addFractions($sum, $listOfArrays[$i]);
        $sum = reduceSum($sum, getGCD($sum[0], $sum[1]));
    }

    return formatSum($sum);
}

/**
 * @param array<int, int[]> $listOfArrays
 * @return int[]
 */
function getFirstFraction(array $listOfArrays): array
{
    return $listOfArrays[0];
}

/**
 * @param int[] $fractionOne
 * @param int[]|int $fractionTwo
 * @return int[]
 */
function addFractions(array $fractionOne, array $fractionTwo): array
{
    $lcm = getLCM($fractionOne[1], $fractionTwo[1]);
    $numerator = calculateNumerator($fractionOne, $lcm) + calculateNumerator($fractionTwo, $lcm);

    return [$numerator, $lcm];
}

function getLCM(int $numberOne, int $numberTwo): int
{
    $max = max($numberOne, $numberTwo);
    $min = min($numberOne, $numberTwo);

    $lcm = $max;

    while ($lcm % $min !== 0) {
        $lcm += $max;
    }

    return $lcm;
}

/**
 * @param int[] $fraction
 * @param int $lmc
 * @return int
 */
function calculateNumerator(array $fraction, int $lmc): int
{
    return $fraction[0] * ($lmc / $fraction[1]);
}

/**
 * @param int[] $sum
 * @return int[]|int
 */
function formatSum(array $sum): array|int
{
    return $sum[0] % $sum[1] === 0 ? $sum[0] / $sum[1] : $sum;
}

/**
 * @param int[] $sum
 * @param int $gcd
 * @return int[]
 */
function reduceSum(array $sum, int $gcd): array
{
    return [
        $sum[0] / $gcd,
        $sum[1] / $gcd,
    ];
}

function getGCD(int $numberOne, int $numberTwo): int
{
    if ($numberTwo === 0) {
        return $numberOne;
    }

    return getGCD($numberTwo, $numberOne % $numberTwo);
}
