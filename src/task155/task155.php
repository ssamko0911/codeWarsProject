<?php

declare(strict_types = 1);

//https://leetcode.com/problems/valid-perfect-square/

function isPerfectSquare(int $num): bool
{
    $counter = 1;

    while ($num > 0) {
        $num -= $counter;

        if ($num === 0) {
            return true;
        }

        $counter += 2;
    }

    return false;
}
