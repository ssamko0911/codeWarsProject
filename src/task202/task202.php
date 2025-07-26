<?php declare(strict_types=1);

//https://www.codewars.com/kata/5539fecef69c483c5a000015/train/php

/**
 * @param int $start
 * @param int $stop
 * @return int[]
 */
function backwardsPrime(int $start, int $stop): array
{
    $backwardPrimes = [];

    for ($i = max($start, 10); $i <= $stop; $i++) {
        if (!isPrime($i)) {
            continue;
        }

        $reversed = (int)strrev((string)$i);

        if ($reversed === $i) {
            continue;
        }

        if (isPrime($reversed)) {
            $backwardPrimes[] = $i;
        }
    }

    return $backwardPrimes;
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    if ($number === 2) {
        return true;
    }
    if ($number % 2 === 0) {
        return false;
    }

    $sqrt = (int)sqrt($number);
    for ($i = 3; $i <= $sqrt; $i += 2) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
