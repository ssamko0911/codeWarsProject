<?php declare(strict_types=1);

//https://www.codewars.com/kata/59b2883c5e2308b54d000013/train/php

/**
 * @param int[] $numbers
 * @return bool
 */
function is_onion_array(array $numbers): bool
{
    $count = count($numbers);
    $half = (int) floor($count / 2);



    for ($i = 0; $i < $half; $i++) {
        if (($numbers[$i] + $numbers[$count  - 1 - $i]) > 10) {
            return false;
        }
    }

    return true;
}
