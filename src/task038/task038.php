<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5a99a03e4a6b34bb3c000124/train/php

const FIRST_PRIME_NUMBER = 2;

function getNumberPrimorial(int $number): int
{
    $primeNumbers = getPrimeNumbers($number);

    return array_product($primeNumbers);
}

function isPrime($number): bool
{
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

/**
 * @return int[]
 */
function getPrimeNumbers(int $value): array
{
    $numberCounter = FIRST_PRIME_NUMBER;
    $primeNumbers = [];

    while (count($primeNumbers) !== $value) {
        if (isPrime($numberCounter)) {
            $primeNumbers[] = $numberCounter;
        }
        $numberCounter++;
    }

    return $primeNumbers;
}
