<?php

declare(strict_types = 1);

//https://leetcode.com/problems/plus-one/description/

/**
 * @param int[] $digits
 * @return int[]
 */
function plusOne(array $digits): array
{
    $threshold = 10;

    if (1 === count($digits) && $threshold === $digits[0] + 1) {
        return [1, 0];
    }

    for ($i = count($digits) - 1; $i >= 0; $i--) {
        $digits[$i] = $digits[$i] + 1;

        if ($threshold !== $digits[$i]) {
            return $digits;
        } else {
            $digits[$i] = 0;
        }
    }

    if(0 === $digits[0]) {
        array_unshift($digits, 1);
    }

    return $digits;
}
