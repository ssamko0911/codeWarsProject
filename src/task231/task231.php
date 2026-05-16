<?php declare(strict_types=1);

// https://www.codewars.com/kata/57fafd0ed80daac48800019f/train/php
const CHAR_TO_MOVE = '!';

function remove(string $str): string
{
    $updatedString = '';
    $accumulator = '';
    $length = mb_strlen($str);

    for ($i = 0; $i < $length; $i++) {
        $str[$i] === CHAR_TO_MOVE ?
            $accumulator .= $str[$i] :
            $updatedString .= $str[$i];
    }

    return $updatedString.$accumulator;
}
