<?php

declare(strict_types=1);

//https://www.codewars.com/kata/55ab4f980f2d576c070000f4/train/php

function getGamePointsSum($rows)
{
    if ($rows <= 0) {
        return 0;
    }

    $points = [];

    for ($i = $rows - 1; $i >= 0; $i--) {
        for ($j = 0; $j < $rows; $j++) {
            $points[$i][$j] = ($j + 1) / ($i + $j + 2);
        }
    }

    $total = array_sum(array_map('array_sum', $points));

    $result = decimalToFraction($total);

    if ($result[0] % $result[1] === 0 && $result[0] / $result[1] === 1) {
        $result = [
            $result[0] / $result[1],
            $result[1] / $result[1],
        ];
    }

    return formatSum($result);
}

function decimalToFraction($decimal)
{
    if ($decimal == 0) {
        return [0];
    }

    $tolerance = 1.e-4;

    $numerator = 1;
    $h2 = 0;
    $denominator = 0;
    $k2 = 1;
    $b = 1 / $decimal;
    do {
        $b = 1 / $b;
        $a = floor($b);
        $aux = $numerator;
        $numerator = $a * $numerator + $h2;
        $h2 = $aux;
        $aux = $denominator;
        $denominator = $a * $denominator + $k2;
        $k2 = $aux;
        $b = $b - $a;
    } while (abs($decimal - $numerator / $denominator) > $decimal * $tolerance);

    return [
        intval($numerator),
        intval($denominator),
    ];
}

/**
 * @param int[] $sum
 * @return int[]|int
 */
function formatSum(array $sum): array|int
{
    return $sum[0] % $sum[1] === 0 ? [intval($sum[0] / $sum[1])] : $sum;
}

print_r(getGamePointsSum(8));
print_r(getGamePointsSum(1));
print_r(getGamePointsSum(40));
print_r(getGamePointsSum(101));