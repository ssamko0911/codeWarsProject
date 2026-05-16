<?php declare(strict_types=1);

// https://www.codewars.com/kata/540c33513b6532cd58000259/train/php

/**
 * @param int ...$args
 */
function sum(... $args): int {
    $sum = 0;

    foreach ($args as $arg) {
        $sum += $arg;
    }

    return $sum;
}
