<?php

declare(strict_types=1);

//https://www.codewars.com/kata/511f11d355fe575d2c000001/train/php

/**
 * @param int[] $ages
 * @return int[]
 */
function twoOldestAges(array $ages): array
{
    sort($ages);

    return array_slice($ages, -2, 2);
}
