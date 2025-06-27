<?php

declare(strict_types=1);

//https://www.codewars.com/kata/585d7d5adb20cf33cb000235/train/php

const ARRAY_LENGTH = 2;

/**
 * @param int|float[] $numbers
 * @return int|float[]
 */
function findUnique(array $numbers): int|float
{
    $twoFirstElements = array_slice($numbers, 0, ARRAY_LENGTH);

    if ($twoFirstElements[0] === $twoFirstElements[1]) {
        $unique = array_filter($numbers, static function (int $number) use ($twoFirstElements): bool
        {
            return $number !== $twoFirstElements[0];
        });

        return array_values($unique)[0];
    }

    return $twoFirstElements[0] === $numbers[ARRAY_LENGTH] ? $twoFirstElements[1] : $twoFirstElements[0];
}
