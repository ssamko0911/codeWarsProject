<?php

declare(strict_types = 1);

//https://www.codewars.com/kata/556deca17c58da83c00002db/train/php

function tribonacci($signature, $length) {
    if (0 === count($signature)) {
        return [];
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

print_r(tribonacci([1,1,1],10));
print_r(tribonacci([0,0,0],10));
print_r(tribonacci([1,1,1],1));