<?php declare(strict_types=1);

// https://www.codewars.com/kata/5dad6e5264e25a001918a1fc/train/php

const ALPHABET_LENGTH = 26;
const ASCII_LOWERCASE_CHAR_CODE_START = 97;
const DIGIT_PATTERN = '/\d+/';
const DECODE_FAILURE_LABEL = 'Impossible to decode';
const E_LABEL = 'No decode key given';

function decode(string $str): string {
    if (!preg_match(DIGIT_PATTERN, $str, $matches)) {
        throw new DomainException(E_LABEL);
    }

    $decipherKey = $matches[0];
    $encodingBaseStr = substr($str, strpos($str, $decipherKey) + strlen($decipherKey));

    $undo = 0;
    for ($i = 1; $i < ALPHABET_LENGTH; $i++) {
        if ((int) $decipherKey * $i % ALPHABET_LENGTH === 1) {
            $undo = $i;
            break;
        }
    }

    if (0 === $undo) {
        return DECODE_FAILURE_LABEL;
    }

    $encodingChars = str_split($encodingBaseStr);
    $decoded = '';

    foreach ($encodingChars as $char) {
        $charCode = ord($char) - ASCII_LOWERCASE_CHAR_CODE_START;
        $decodedCharCode = $undo * $charCode % ALPHABET_LENGTH;
        $decoded .= chr($decodedCharCode + ASCII_LOWERCASE_CHAR_CODE_START);
    }

    return $decoded;
}
