<?php declare(strict_types=1);

//https://www.codewars.com/kata/56f7493f5d7c12d1690000b6/train/php

/**
 * @param array<int|string> $data
 * @return array<int|string>
 */
function mean(array $data): array
{
    $sum = 0;
    $str = '';

    array_walk(
        $data,
        static function (int|string $item) use (&$sum, &$str) {
            if (preg_match('/^[a-zA-Z]$/', $item)) {
                $str .= $item;
            }

            if (preg_match('/^\d+$/', $item)) {
                $sum += (int) $item;
            }
        }
    );

    return [$sum / (count($data) / 2), $str];
}
