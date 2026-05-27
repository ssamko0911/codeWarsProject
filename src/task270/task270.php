<?php declare(strict_types=1);

// https://www.codewars.com/kata/55ee3ebff71e82a30000006a/train/php

const ASCII_DECREMENT = 64;
const LETTER_COUNT_ENG = 26;

/**
 * Note: All column titles are guaranteed to be uppercase.
 */
function titleToNumber(string $title): int
{
    $chars = mb_str_split(strrev($title));

    $colNumber = 0;

    foreach ($chars as $key => $value) {
        $colNumber += (ord($value) - ASCII_DECREMENT) * (LETTER_COUNT_ENG ** $key);
    }

    return $colNumber;
}
