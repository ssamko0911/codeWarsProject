<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5ce399e0047a45001c853c2b/php

/**
 * @param int[] $inputArray
 * @return int[]
 */
function getPartSums(array $inputArray): array
{
    $sumArray = array_map(function($key) use ($inputArray){
        return array_sum(array_slice($inputArray, $key));
    }, array_keys($inputArray));

    $sumArray[] = 0;

    return $sumArray;
}
