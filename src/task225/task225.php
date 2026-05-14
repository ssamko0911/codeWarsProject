<?php declare(strict_types=1);

// https://www.codewars.com/kata/5f77d62851f6bc0033616bd8/train/php

function valid_spacing(string $str): bool
{
    if (' ' === $str) {
        return false;
    }

    if (str_starts_with($str, ' ')) {
        return false;
    }

    if (str_ends_with($str, ' ')) {
        return false;
    }

    $length = mb_strlen($str);

    for ($i = 1; $i < $length; $i++) {
        if (' ' === $str[$i - 1] & ' ' === $str[$i]) {
            return false;
        }
    }

    return true;
}
