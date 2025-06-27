<?php declare(strict_types = 1);

//https://www.codewars.com/kata/5848565e273af816fb000449/train/php

function encryptThis($text): string
{
    $words = explode(' ', $text);

    if (1 === count($words)) {
        return encryptWord($words[0]);
    }

    $encrypted = '';

    foreach ($words as $word) {
        $encrypted .= encryptWord($word) . ' ';
    }

    return rtrim($encrypted);
}

function encryptWord(string $word): string
{
    if (1 === strlen($word)) {
        return (string) ord($word[0]);
    }

    $wordWithoutFirstLetter = substr($word, 1);

    $charCode = ord($word[0]);
    $secondLetter = $word[1];
    $lastLetter = $word[strlen($word) - 1];

    $wordWithoutFirstLetter[0] = $lastLetter;
    $wordWithoutFirstLetter[strlen($wordWithoutFirstLetter) - 1] = $secondLetter;

    return $charCode . $wordWithoutFirstLetter;
}
