<?php declare(strict_types=1);

// https://www.codewars.com/kata/57fb142297e0860073000064/train/php

const EXCL_MARK = '!';
const Q_MARK = '?';

function product(string $str): int
{
    $chars = str_split($str);
    $exclamationMarkCount = 0;
    $questionMarkCount = 0;

    array_walk(
        $chars,
        static function (string $item) use (&$exclamationMarkCount, &$questionMarkCount): void {
            if (EXCL_MARK === $item) {
                $exclamationMarkCount++;
            }

            if (Q_MARK === $item) {
                $questionMarkCount++;
            }
        }
    );

    return $exclamationMarkCount * $questionMarkCount;
}
