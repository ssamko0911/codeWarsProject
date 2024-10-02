<?php

declare(strict_types=1);

//https://www.codewars.com/kata/59325dc15dbb44b2440000af/train/php

const VOWELS = [
    'a', 'e', 'i', 'o', 'u',
];

function isAlt(string $string): bool
{
    $toggleBool = checkFirstChar($string);

    for ($i = 1; $i < strlen($string); $i++) {
        $isVowel = in_array($string[$i], VOWELS);

        if ($isVowel !== $toggleBool) {
            $toggleBool = $isVowel;
        } else {
            return false;
        }
    }

    return true;
}

function checkFirstChar(string $str): bool
{
    return in_array($str[0], VOWELS);
}
