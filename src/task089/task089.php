<?php

declare(strict_types=1);

//https://www.codewars.com/kata/550554fd08b86f84fe000a58/train/php

/**
 * @param string[] $arrayNeedles
 * @param string[] $arrayValues
 * @return string[]
 */
function inArray(array $arrayNeedles, array $arrayValues): array
{
    $substrings = array_filter($arrayNeedles, function ($needle) use ($arrayValues) {
        return strstr(implode(' ', $arrayValues), $needle);
    });

    sort($substrings);

    return $substrings;
}
