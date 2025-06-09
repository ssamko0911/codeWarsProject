<?php declare(strict_types=1);

//https://www.codewars.com/kata/58e2708f9bd67fee17000080/train/php

/**
 * @param int $num
 * @return int[]|string
 */
function palindrome(int $num): array|string {
    if (0 > $num) {
        return 'Not valid';
    }

    $numAsString = (string) $num;
    $palindromes = [];

    for ($i = 0; $i < strlen($numAsString); $i++) {
        $numberPool = substr($numAsString, $i);
        addFoundPalindromes($numberPool, $palindromes);
    }

    if (0 === count($palindromes)) {
        return 'No palindromes found';
    }

    sort($palindromes, SORT_NUMERIC);

    return array_values(
        array_unique(
            $palindromes
        )
    );
}

function validate(string $number): bool
{
    if ('0' === $number[0]) {
        return false;
    }

    return true;
}

function isPalindrome(string $number): bool
{
    return $number === strrev($number);
}

function addFoundPalindromes(string $number, array &$palindromes): void
{
    $palindromeBase = $number[0];

    for ($i = 1; $i < strlen($number); $i++) {
        $palindromeBase .= $number[$i];
        if (isPalindrome($palindromeBase) && validate($palindromeBase)) {
            $palindromes[] = (int) $palindromeBase;
        }
    }
}
