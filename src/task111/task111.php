<?php

declare(strict_types=1);

//https://www.codewars.com/kata/52de553ebb55d1fca3000371/train/php

/**
 * @param int[] $list
 * @return int
 */
function findMissingElement(array $list): int
{
    $length = count($list);
    $start = $list[0];
    $end = $list[$length - 1];

    if (($start + $end) % 2 === 0) {
        $sum = (($start + $end) / 2) * ($length + 1);
    } else {
        $sum = (($length + 1) / 2) * ($start + $end);
    }

    return $sum - array_sum($list);
}
