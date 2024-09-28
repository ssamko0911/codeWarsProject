<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5264d2b162488dc400000001/train/php

const DEFAULT_REVERSE_LENGTH = 5;

function spinWords(string $string): string
{
    $words = explode(' ', $string);

    return implode(' ',
        array_map(function ($word) {
            return strlen($word) >= DEFAULT_REVERSE_LENGTH ? strrev($word) : $word;
        }, $words)
    );
}
