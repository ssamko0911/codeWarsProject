<?php declare(strict_types=1);

//https://www.codewars.com/kata/559536379512a64472000053/train/php

const CONTROL_TOTAL_NUMERIC = 9;
const START_UPPERCASE_LETTERS_RANGE = 65;
const END_UPPERCASE_LETTERS_RANGE = 90;

function playPass(string $passPhrase, int $number): string
{
    $charCodes = range(
        START_UPPERCASE_LETTERS_RANGE,
        END_UPPERCASE_LETTERS_RANGE
    );
    $encoded = '';

    for ($i = 0; $i < strlen($passPhrase); $i++) {
        if (in_array(ord($passPhrase[$i]), $charCodes)) {
            $shiftedChar = getShiftedChar($passPhrase[$i], $number, $charCodes);
            $encoded .= updateRegister($i, $shiftedChar);
        } elseif (is_numeric($passPhrase[$i])) {
            $encoded .= CONTROL_TOTAL_NUMERIC - (int)$passPhrase[$i];
        } else {
            $encoded .= $passPhrase[$i];
        }
    }

    return strrev($encoded);
}

function getShiftedChar(
    string $charCode,
    int    $number,
    /** @var int[] $charCodes */
    array  &$charCodes
): string
{
    $key = ord($charCode) - START_UPPERCASE_LETTERS_RANGE;

    if ($key + $number > count($charCodes) - 1) {
        $charCode = ($key + $number - count($charCodes)) + START_UPPERCASE_LETTERS_RANGE;
    } else {
        $charCode = $charCodes[$key + $number];
    }

    return chr($charCode);
}

function updateRegister(int $key, string $char): string
{
    if (0 !== $key % 2) {
        return strtolower($char);
    }

    return $char;
}
