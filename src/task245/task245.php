<?php declare(strict_types=1);

// https://www.codewars.com/kata/559e5b717dd758a3eb00005a/train/php

const SEPARATOR = ' ';
const STR_LENGTH_THRESHOLD = 2;

function dropCap(string $str): string
{
    if ('' === $str) {
        return '';
    }

    $strAsArray = explode(SEPARATOR, ($str));

    return implode(
        SEPARATOR,
        array_map(
            static fn(string $str): string => strlen($str) > STR_LENGTH_THRESHOLD ? ucfirst(strtolower($str)) : $str,
            $strAsArray
        )
    );
}
