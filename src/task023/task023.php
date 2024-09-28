<?php

declare(strict_types=1);

//https://www.codewars.com/kata/596f72bbe7cd7296d1000029/train/php

/**
 * @param int|string[] $array
 * @return int
 */
function deepCount(array $array): int
{
    $totalCount = 0;

    foreach ($array as $item) {
        $totalCount++;
        if (is_array($item)) {
            $totalCount += deepCount($item);
        }
    }

    return $totalCount;
}
