<?php

declare(strict_types = 1);

//https://leetcode.com/problems/word-pattern/

function wordPattern(string $pattern, string $str): bool
{
    $numericPattern = getNumericPattern($pattern, array_unique(str_split($pattern)));

    $numericPatternForWords = getNumericPatternForWords($str);

    return $numericPattern === $numericPatternForWords;
}

/**
 * @param string $str
 * @param string[] $chars
 * @return string
 */
function getNumericPattern(string $str, array $chars): string
{
    $numericPattern = $str;

    foreach ($chars as $key => $letter) {
        if (in_array($letter, str_split($numericPattern))) {
            $numericPattern = str_replace($letter, (string) $key, $numericPattern);
        }
    }

    return $numericPattern;
}

function getNumericPatternForWords(string $str): string
{
    $words = explode(' ', $str);

    $numericPatternAsArray = [];

    foreach ($words as $word) {
        if (in_array($word, $words)) {
            $numericPatternAsArray[] = array_search($word, $words);
        }
    }

    return implode('', $numericPatternAsArray);
}
