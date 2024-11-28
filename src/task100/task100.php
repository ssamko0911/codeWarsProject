<?php

declare(strict_types=1);

const MORSE_CODE_TABLE = [
    '-.-.--' => '!',
    '.-..-.' => '"',
    '...-..-' => '$',
    '.-...' => '&',
    '.----.' => "'",
    '-.--.' => '(',
    '-.--.-' => ')',
    '.-.-.' => '+',
    '--..--' => ',',
    '-....-' => '-',
    '.-.-.-' => '.',
    '-..-.' => '/',
    '-----' => '0',
    '.----' => '1',
    '..---' => '2',
    '...--' => '3',
    '....-' => '4',
    '.....' => '5',
    '-....' => '6',
    '--...' => '7',
    '---..' => '8',
    '----.' => '9',
    '---...' => ':',
    '-.-.-.' => ';',
    '-...-' => '=',
    '..--..' => '?',
    '.--.-.' => '@',
    '.-' => 'A',
    '-...' => 'B',
    '-.-.' => 'C',
    '-..' => 'D',
    '.' => 'E',
    '..-.' => 'F',
    '--.' => 'G',
    '....' => 'H',
    '..' => 'I',
    '.---' => 'J',
    '-.-' => 'K',
    '.-..' => 'L',
    '--' => 'M',
    '-.' => 'N',
    '---' => 'O',
    '.--.' => 'P',
    '--.-' => 'Q',
    '.-.' => 'R',
    '...' => 'S',
    '-' => 'T',
    '..-' => 'U',
    '...-' => 'V',
    '.--' => 'W',
    '-..-' => 'X',
    '-.--' => 'Y',
    '--..' => 'Z',
    '..--.-' => '_',
    '...---...' => 'SOS',
];

const WORD_SEPARATOR = '   ';
const LETTER_SEPARATOR = ' ';

function decodeMorse(string $code): string
{
    $words = explode(WORD_SEPARATOR, trim($code));

    $decoded = '';

    foreach ($words as $word) {
        $letters = explode(LETTER_SEPARATOR, $word);
        $decoded .= getDecodedWord($letters);
        $decoded .= ' ';
    }

    return trim($decoded);
}

/**
 * @param string[] $chars
 * @return string
 */
function getDecodedWord(array $chars): string
{
    return implode('', array_map(
            function ($char) {
                return $char !== '' ? MORSE_CODE_TABLE[$char] : ' ';
            },
            $chars)
    );
}
