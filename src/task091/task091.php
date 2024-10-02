<?php

declare(strict_types=1);

//https://www.codewars.com/kata/52b757663a95b11b3d00062d/train/php

function toWeirdCase(string $str): string
{
    $strings = array_map('changeLetterCase', explode(' ', $str));

    return implode(' ', $strings);
}

function changeLetterCase(string $str): string
{
    $changedCase = '';

    for ($i = 0; $i < strlen($str); $i++) {
        if (0 === $i % 2) {
            $changedCase .= strtoupper($str[$i]);
        } else {
            $changedCase .= strtolower($str[$i]);
        }
    }

    return $changedCase;
}
