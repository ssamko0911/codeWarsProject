<?php declare(strict_types=1);

//https://www.codewars.com/kata/57b6f850a6fdc76523001162/train/php

/** @return array<int, int[]> */
function counter_effect(string $hit_count): array
{
    return array_map(
    /** @return int[] */
        static function (string $number): array {
            return range(0, (int) $number);
        },
        mb_str_split($hit_count)
    );
}
