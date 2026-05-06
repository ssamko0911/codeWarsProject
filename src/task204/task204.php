<?php declare(strict_types=1);

//https://www.codewars.com/kata/580435ab150cca22650001fb/train/php


/**
 * @param int[] $numbers
 * @return int[]
 */
function filter_lucky(array $numbers): array
{
    $digit = '7';

    return array_values(
        array_filter(
            $numbers,
            static function (int $number) use ($digit): bool {
                return str_contains((string)$number, $digit);
            }
        )
    );
}
