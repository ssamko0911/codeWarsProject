<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5839edaa6754d6fec10000a2/train/php

/**
 * @param string[] $array
 * @return string
 */
function findMissingLetter(array $array): string
{
    $completedArray = range($array[0], $array[count($array) - 1]);

    return implode('', array_diff($completedArray, $array));
}

echo findMissingLetter(['a','b','c','d','f']);