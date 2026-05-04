<?php declare(strict_types=1);

//https://www.codewars.com/kata/566fc12495810954b1000030/train/php

function nbDig(int $number, int $digit): int
{
    $squares = array_map(
        static function (int $number): string {
            return (string)($number ** 2);
        },
        range(0, $number)
    );

    $needle = (string) $digit;

    return array_sum(array_map(
        static function (string $number) use ($needle): int {
            return substr_count($number, $needle);
        },
        $squares
    ));
}
