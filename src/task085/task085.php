<?php

declare(strict_types=1);

//https://www.codewars.com/kata/515de9ae9dcfc28eb6000001/train/php

const DEFAULT_CHUNK_LENGTH = 2;

/**
 * @param string $string
 * @return string[]
 */
function solution(string $string): array
{
    if (0 === strlen($string)) {
        return [];
    }

    $parts = str_split($string, DEFAULT_CHUNK_LENGTH);

    if (1 === getLastItemLength($parts)) {
        adjustLastElementValue($parts);
    }

    return $parts;
}

/**
 * @param string[] $strings
 * @return int
 */
function getLastItemLength(array $strings): int
{
    return strlen($strings[count($strings) - 1]);
}

/**
 * @param string[] $strings
 * @return void
 */
function adjustLastElementValue(array &$strings): void
{
    $strings[count($strings) - 1] .= '_';
}
