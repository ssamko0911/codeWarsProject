<?php declare(strict_types=1);

// https://www.codewars.com/kata/57ebaa8f7b45ef590c00000c/train/php

const SPECIAL_CASES = [
    27 => '!',
    28 => '?',
    29 => ' ',
];

/**
 * @param string[] $array
 */
function switcher(array $array): string
{
    return implode(
        '',
        array_map(
            static function (string $item): string {
                return SPECIAL_CASES[$item] ?? chr(123 - (int)$item);
            },
            $array
        )
    );
}
