<?php declare(strict_types=1);

// https://www.codewars.com/kata/5277c8a221e209d3f6000b56/train/php

const MAPPING = [
    '(' => ')',
    '[' => ']',
    '{' => '}',
];

const OPENING_BRACES = ['(', '[', '{'];
const CLOSING_BRACES = [')', ']', '}'];

function validBraces(string $braces): bool
{
    $strLength = mb_strlen($braces);
    $stack = [];

    for ($i = 0; $i < $strLength; $i++) {
        if (in_array($braces[$i], OPENING_BRACES, true)) {
            $stack[] = $braces[$i];
        }

        if (in_array($braces[$i], CLOSING_BRACES, true)) {
            if ([] === $stack) {
                return false;
            }

            if (MAPPING[array_pop($stack)] !== $braces[$i]) {
                return false;
            }
        }
    }

    return [] === $stack;
}
