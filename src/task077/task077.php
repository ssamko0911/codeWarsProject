<?php

declare(strict_types=1);

//https://leetcode.com/problems/longest-common-prefix/

/**
 * @param string[] $strings
 * @return string
 */
function getLongestCommonPrefix(array $strings): string
{
    if ([] === ($strings)) {
        return '';
    }

    if (count($strings) === 1) {
        return $strings[0];
    }

    $commonPrefix = '';

    $i = 0;
    while (true) {
        $tempCheckLetter = getLettersToCompare($strings, $i);

        if ([] === $tempCheckLetter) {
            return '';
        }

        if (!checkEqualLetters($tempCheckLetter)) {
            break;
        }

        $commonPrefix .= $tempCheckLetter[$i];
        $i++;
    }

    return $commonPrefix;
}

/**
 * @param string $str
 * @param int $index
 * @return string;
 */
function getLetter(string $str, int $index): string
{
    return $str[$index];
}

/**
 * @param string[] $words
 * @param int $index
 * @return string[]
 */
function getLettersToCompare(array $words, int $index): array
{
    $letters = [];

    foreach ($words as $word) {
        if ('' !== $word) {
            $letters[] = getLetter($word, $index);
        }
    }

    return $letters;
}

/**
 * @param string[] $letters
 * @return bool
 */
function checkEqualLetters(array $letters): bool
{
    return 1 === count(array_unique($letters, SORT_REGULAR));
}

echo getLongestCommonPrefix(["","b"]);