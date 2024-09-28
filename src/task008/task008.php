<?php

declare(strict_types=1);

//https://www.codewars.com/kata/58d76854024c72c3e20000de/train/php

function reverse($string): string
{
    $stringResult = '';

    $words = explode(' ', $string);

    foreach ($words as $key => $word) {
        if ($key % 2 !== 0) {
            $stringResult .= strrev($word) . ' ';
        } else {
            $stringResult .= $word . ' ';
        }
    }

    return trim($stringResult);
}
