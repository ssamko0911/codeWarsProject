<?php declare(strict_types=1);

// https://www.codewars.com/kata/5a4e3782880385ba68000018

const LABEL_BALANCED = 'Balanced';
const LABEL_NOT_BALANCED = 'Not Balanced';

function balancedNum(int $num): string
{
    $digits = array_map(
        static function (string $digit): int {
            return (int)$digit;
        },
        str_split((string)$num)
    );

    $length = count($digits);

    if (2 >= $length) {
        return LABEL_BALANCED;
    }

    $middle = (int)($length / 2);

    if (0 !== $length % 2) {
        $isBalanced = array_sum(array_slice($digits, 0, $middle)) ===
            array_sum(array_slice($digits, $middle + 1));
    } else {
        $isBalanced = array_sum(
                array_slice(
                    $digits,
                    0,
                    $length - $middle - 1
                )
            ) ===
            array_sum(
                array_slice(
                    $digits,
                    $length - $middle + 1
                )
            );
    }

    return $isBalanced ? LABEL_BALANCED : LABEL_NOT_BALANCED;
}
