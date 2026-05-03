<?php declare(strict_types=1);

//https://www.codewars.com/kata/5868812b15f0057e05000001/train/php

/**
 * @param string[] $strings
 * @return string[]
 */
function tail_swap(array $strings): array {
    $heads = [];
    $tails = [];
    $separator = ':';

    array_walk(
        $strings,
        static function (string $value) use (&$heads, &$tails, $separator): void {
            $heads[] = substr($value, 0, strpos($value, $separator));
            $tails[] = substr($value, strpos($value, $separator) + 1);
        }
    );

    return [
        $heads[0] . $separator . $tails[1],
        $heads[1] . $separator . $tails[0]
    ];
}
