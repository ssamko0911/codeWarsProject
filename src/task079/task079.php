<?php

declare(strict_types=1);

//https://www.codewars.com/kata/59f4a0acbee84576800000af/train/php

function posAverage(string $str): float
{
    $pairs = getAllPairs(explode(', ', $str));

    $maxMatch = getMaxMatchCount($pairs);

    $countMatch = 0;

    foreach ($pairs as $pair) {
        $countMatch += countNumberMatch($pair);
    }

    return ($countMatch / $maxMatch) * 100;
}

/**
 * @param  array<int, string> $strings
 * @return array<int, array<int, string>>
 */
function getAllPairs(array $strings): array
{
    $pairs = [];

    for ($i = 0; $i < count($strings) - 1; $i++) {
        for ($j = $i + 1; $j < count($strings); $j++) {
            $pairs[] = [$strings[$i], $strings[$j]];
        }
    }

    return $pairs;
}

function countNumberMatch(array $strings): int
{
    return count(
        array_intersect_assoc(
            str_split($strings[0]), str_split($strings[1])
        )
    );
}

function getMaxMatchCount(array $strings): int
{
    return strlen($strings[0][0]) * count($strings);
}
