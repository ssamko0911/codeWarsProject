<?php declare(strict_types=1);

// https://www.codewars.com/kata/5a662a02e626c54e87000123/train/php

/** @return int[] */
function extraPerfect(int $number): array
{
    $numbers = range(1, $number);

    $perfectNumbers = array_filter(
        $numbers,
        static function (int $number): bool {
            $binaryNumber = decbin($number);
            $binaryNumberLength = strlen($binaryNumber);

            return $binaryNumber[0] === $binaryNumber[$binaryNumberLength - 1];
        }
    );

    return array_values($perfectNumbers);
}
