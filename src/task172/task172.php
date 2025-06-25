<?php declare(strict_types=1);

//https://www.codewars.com/kata/58de819eb76cf778fe00005c/train/php

function palindrome(int $number): bool|string
{
    if (0 > $number) {
        return 'Not valid';
    }

    $numberAsString = (string) $number;

    for ($i = 0; $i < strlen($numberAsString); $i++) {
        $numberPool = substr($numberAsString, $i);

        if (findPalindrome($numberPool)) {
            return true;
        }
    }

    return false;
}

function isPalindrome(string $number): bool
{
    return $number === strrev($number);
}

function findPalindrome(string $number): bool
{
    $palindromeBase = $number[0];

    for ($i = 1; $i < strlen($number); $i++) {
        $palindromeBase .= $number[$i];
        if (isPalindrome($palindromeBase)) {
            return true;
        }
    }

    return false;
}
