<?php

declare(strict_types=1);

//https://www.codewars.com/kata/577e277c9fb2a5511c00001d/train/php

const VOWELS = [
    'a',
    'e',
    'i',
    'o',
    'u',
    'A',
    'E',
    'I',
    'O',
    'U',
];

function vowelShift(string $text, int $steps): string
{
    if ('' === $text || 0 === $steps) {
        return $text;
    }

    $textVowelsAsArray = extractVowels($text);
    $shifted = shiftVowels($textVowelsAsArray, $steps);

    return substituteVowels($text, $shifted);
}

/**
 * @param string $text
 * @return string[]
 */
function extractVowels(string $text): array
{
    return array_values(
            array_filter(str_split($text), static function (string $vowel): bool
            {
                return in_array($vowel, VOWELS, true);
            }
        )
    );
}

/**
 * @param string[] $vowels
 * @param int $steps
 * @return string[]
 */
function shiftVowels(array $vowels, int $steps): array
{
    $length = count($vowels);
    $steps %= $length;

    if ($steps > 0) {
        return array_merge(
            array_slice($vowels, -$steps),
            array_slice($vowels, 0, $length - $steps)
        );
    }

    $steps = (int) abs($steps);
    return array_merge(
        array_slice($vowels, $steps),
        array_slice($vowels, 0, $steps)
    );
}

/**
 * @param string $text
 * @param string[] $vowels
 * @return string
 */
function substituteVowels(string $text, array $vowels): string
{
    $modified = '';
    $length = strlen($text);
    $index = 0;

    for ($i = 0; $i < $length; $i++) {
        if (in_array($text[$i], VOWELS, true)) {
            $modified .= $vowels[$index];
            $index++;
        } else {
            $modified .= $text[$i];
        }
    }

    return $modified;
}
