<?php declare(strict_types=1);

// https://www.codewars.com/kata/5904be220881cb68be00007d/train/php

namespace App\Task275;

final class Solution
{
    /** @var int[]  */
    const array NEXT_SIZE_CONSUMPTION = [
        4, 12, 24, 40, 60, 84
    ];

    public static function fish(string $shoal): int {
        $shoalAsArray = array_map(
            intval(...),
            str_split($shoal)
        );

        sort($shoalAsArray, SORT_NUMERIC);

        $currentFishSizeCategory = 0;
        $fishSize = 0;

        foreach ($shoalAsArray as $key => $fish) {
            if ($fishSize >= self::NEXT_SIZE_CONSUMPTION[$currentFishSizeCategory - 1]) {
                $currentFishSizeCategory++;
            }

            if ($fish <= $currentFishSizeCategory) {
                $fishSize += $fish;
                unset($shoalAsArray[$key]);
            }
        }

        if ($fishSize >= self::NEXT_SIZE_CONSUMPTION[$currentFishSizeCategory - 1]) {
            $currentFishSizeCategory++;
        }

        return $currentFishSizeCategory;
    }
}

/*
 * 11112222 - get array of ints
 * current size = 1
 * amtToReach the next size = 4
 * allowed = 1
 * consume 1, 1, 1, 1
 * 2222 - rest
 * current size = 2
 * amtToReach the next size = 8
 * allowed = 1, 2
 * consume 2, 2, 2, 2
 * current size = 3
 *
 * fishCat = 0
 * 4 + (0 * 4) 4
 * 4 + (1 * 4) 8
 * 4 + (2 * 4) 12
 * 4 + (3 * 4) 16
 *
 *
 */

echo Solution::fish('11112222') . PHP_EOL;
echo Solution::fish('111111111111') . PHP_EOL;
echo Solution::fish('111122223333') . PHP_EOL;
echo Solution::fish('6') . PHP_EOL;
echo Solution::fish('151128241212192113722321331') . PHP_EOL;
echo Solution::fish('2298666641923865218780611370267078312097423764239924983208692301') . PHP_EOL;
echo Solution::fish('31231786125267434129967936006106957129105777290352050550') . PHP_EOL; // 11