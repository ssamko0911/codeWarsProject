<?php

declare(strict_types=1);

//https://www.codewars.com/kata/581e014b55f2c52bb00000f8/train/php

function decipher(string $string): string
{
    $deciphered = '';

    $words = explode(' ', $string);

    foreach ($words as $word) {
        $firstPart = preg_replace("/[^0-9]/", '', $word);
        $deciphered .= chr(intval($firstPart));

        $secondPart = trim(str_replace($firstPart, '', $word));

        if (strlen($secondPart) !== 0) {
            $secondPart = swapFirstAndLastLetter($secondPart);
        }

        $deciphered .= sprintf("%s ", $secondPart);
    }

    return trim($deciphered);
}

function swapFirstAndLastLetter(string $str): string
{
    $firstLetter = substr($str, 0, 1);
    $lastLetter = substr($str, -1, 1);
    $str[0] = $lastLetter;
    $str[strlen($str) - 1] = $firstLetter;

    return $str;
}
