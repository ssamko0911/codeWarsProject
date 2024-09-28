<?php

declare(strict_types=1);

//https://www.codewars.com/kata/586538146b56991861000293/train/php

const NATO_ALPHABET = [
    'A' => 'Alpha',
    'B' => 'Bravo',
    'C' => 'Charlie',
    'D' => 'Delta',
    'E' => 'Echo',
    'F' => 'Foxtrot',
    'G' => 'Golf',
    'H' => 'Hotel',
    'I' => 'India',
    'J' => 'Juliet',
    'K' => 'Kilo',
    'L' => 'Lima',
    'M' => 'Mike',
    'N' => 'November',
    'O' => 'Oscar',
    'P' => 'Papa',
    'Q' => 'Quebec',
    'R' => 'Romeo',
    'S' => 'Sierra',
    'T' => 'Tango',
    'U' => 'Uniform',
    'V' => 'Victor',
    'W' => 'Whiskey',
    'X' => 'Xray',
    'Y' => 'Yankee',
    'Z' => 'Zulu',
];

function toNatoAlphabet(string $string): string
{
    $words = str_split($string);

    $encoded = array_map('encodeCharToNatoAlphabet', $words);

    return rtrim(implode('', $encoded));
}

function encodeCharToNatoAlphabet(string $char): string
{
    if ($char === ' ') {
        return '';
    }

    $key = strtoupper($char);
    if (array_key_exists($key, NATO_ALPHABET)) {
        return NATO_ALPHABET[$key].' ';
    } else {
        return $char.' ';
    }
}
