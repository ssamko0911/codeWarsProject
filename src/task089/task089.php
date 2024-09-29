<?php

declare(strict_types=1);

//https://www.codewars.com/kata/550554fd08b86f84fe000a58/train/php

/**
 * @param string[] $arrayNeedles
 * @param string[] $arrayValues
 * @return string[]
 */
function inArray(array $arrayNeedles, array $arrayValues) {
    $substrings = [];

    foreach ($arrayNeedles as $needle) {
        foreach ($arrayValues as $value) {
            if (str_contains($value, $needle)) {
                $substrings[] = $needle;
            }
        }
    }

    $uniqueSubstrings = array_unique($substrings);
    sort($uniqueSubstrings, SORT_STRING);

    return $uniqueSubstrings;
}
