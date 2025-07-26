<?php declare(strict_types=1);

//https://www.codewars.com/kata/58df8b4d010a9456140000c7/train/php
const BASE_NUMBER = 10;

/**
 * @param int|string $number
 * @param int|string $palindromeCount
 * @return int[]|string
 */
function palindrome(int|string $number, int|string $palindromeCount): array|string
{
    if (0 > $number || 0 > $palindromeCount || is_string($number) || is_string($palindromeCount)) {
        return 'Not valid';
    }

    if ($number < BASE_NUMBER) {
        $number = BASE_NUMBER;
    }

    $counter = 0;
    $palindromes = [];

    while ($counter !== $palindromeCount) {
        if (isPalindrome((string)($number))) {
            $palindromes[] = $number;
            $counter++;
        }

        $number++;
    }

    return $palindromes;
}

function isPalindrome(string $number): bool
{
    return $number === strrev($number);
}
