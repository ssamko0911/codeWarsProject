<?php declare(strict_types=1);

// https://www.codewars.com/kata/581b30af1ef8ee6aea0015b9/train/php

/**
 * @param array<int, array<string, string>> $winnerList
 */
function countWins(array $winnerList, string $country): int
{
    return count(
        array_filter(
            $winnerList,
            /** @param array<string, string> $winner */
            static function (array $winner) use ($country): bool {
                return $country === $winner['country'];
            }
        )
    );
}
