<?php declare(strict_types=1);

//https://www.codewars.com/kata/57eba158e8ca2c8aba0002a0/train/php

/**
 * @param $string
 * @return string[]
 */
function last($string): array {
    $unsorted = explode(' ', $string);
    $sorted = [];

    foreach ($unsorted as $subString) {
        $sorted[$subString] = $subString[strlen($subString) - 1];
    }

    asort($sorted);

    return array_values(array_keys($sorted));
}
