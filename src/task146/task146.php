<?php

declare(strict_types = 1);

//https://leetcode.com/problems/plus-one/description/

/**
 * @param int[] $digits
 * @return int[]
 */
function plusOne(array $digits): array
{
    $number = (float) implode('', $digits);

    return str_split((string) ++$number);
}

print_r(plusOne([1,2,3]));
print_r(plusOne([4,3,2,1]));
print_r(plusOne([9]));