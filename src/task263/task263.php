<?php declare(strict_types=1);

// https://www.codewars.com/kata/586efc2dcf7be0f217000619/train/php

/**
 * @return string[]
 */
function reverse_slice(string $str): array
{
    $reversedSlices = [];
    $length = strlen($str);
    $reversed = strrev($str);

    for ($i = 0; $i < $length; $i++) {
        $reversedSlices[] = substr($reversed, $i);
    }

    return $reversedSlices;
}
