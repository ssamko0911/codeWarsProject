<?php declare(strict_types=1);

//https://www.codewars.com/kata/58df8b4d010a9456140000c7/train/php
const BASE_NUMBER = 10;
function palindrome(int $number): int|string
{
    if (0 > $number) {
        return 'Not valid';
    }

    if ($number < BASE_NUMBER) {
        $number = BASE_NUMBER;
    }

    if (isPalindrome((string)($number))) {
        return $number;
    }

    $step = 1;

    while (!isPalindrome((string)($number + $step))) {
        $step++;
    }

    $increase = $step;
    $step = 1;

    while (!isPalindrome((string)($number - $step))) {
        $step++;
    }

    $decrease = $step;

    if ($increase < $decrease) {
        return $number + $increase;
    }

    if ($increase > $decrease) {
        return $number - $decrease;
    }

    return $number + $increase;
}

function isPalindrome(string $number): bool
{
    return $number === strrev($number);
}
