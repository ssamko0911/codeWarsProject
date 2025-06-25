<?php declare(strict_types=1);

//https://www.codewars.com/kata/58df62fe95923f7a7f0000cc

function palindrome(int $num): int|string
{
    if (0 > $num) {
        return 'Not valid';
    }

    $numAsString = (string) $num;
    $countPalindromes = 0;

    for ($i = 0; $i < strlen($numAsString); $i++) {
        $numberPool = substr($numAsString, $i);
        countPalindromes($numberPool,$countPalindromes);
    }

    return $countPalindromes;
}

function isPalindrome(string $number): bool
{
    return $number === strrev($number);
}

function countPalindromes(string $number, int &$countPalindromes): void
{
    $palindromeBase = $number[0];

    for ($i = 1; $i < strlen($number); $i++) {
        $palindromeBase .= $number[$i];
        if (isPalindrome($palindromeBase)) {
            $countPalindromes++;
        }
    }
}
