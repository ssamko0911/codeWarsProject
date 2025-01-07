<?php

declare(strict_types=1);

//https://www.codewars.com/kata/556e0fccc392c527f20000c5/train/php

/**
 * @param int[] $signature
 * @param int $length
 * @return int[]
 */
function x_bonacci(array $signature, int $length): array
{
    if (0 === count($signature)) {
        return range(1, 9);
    }

    if ($length < count($signature)) {
        return array_slice($signature, 0, $length);
    }

    $sequence = $signature;

    for ($i = 0; $i < $length - count($signature); $i++) {
        $sequence[] = array_sum(
            array_slice($sequence, $i, $length),
        );
    }

    return $sequence;
}
