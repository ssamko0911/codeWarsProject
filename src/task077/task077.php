<?php

declare(strict_types=1);

//https://leetcode.com/problems/longest-common-prefix/

/**
 * @param string[] $strings
 * @return string
 */
function getLongestCommonPrefix(array $strings): string
{
    $commonPrefix = '';

    if (0 === count($strings)) {
        return $commonPrefix;
    }

    $minStringLength = min(
        array_map('strlen', $strings)
    );

    for ($i = 0; $i < $minStringLength; $i++) {
        $letters = array_map(static function ($string) use ($i) {
            return $string[$i];
        }, $strings);

        $isEqualLetter = checkEqualLetters($letters);

        if ($isEqualLetter) {
            $commonPrefix .= $letters[0];
        } else {
            return $commonPrefix;
        }
    }

    return $commonPrefix;
}

/**
 * @param string[] $letters
 * @return bool
 */
function checkEqualLetters(array $letters): bool
{
    return 1 === count(array_unique($letters, SORT_REGULAR));
}
