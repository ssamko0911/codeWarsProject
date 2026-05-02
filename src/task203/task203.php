<?php declare(strict_types=1);

// https://www.codewars.com/kata/57faf32df815ebd49e000117
function remove(string $str): string
{
    if (0 === strlen($str)) {
        return $str;
    }

    $strings = explode(' ', $str);

    $trimmedStrings = array_map(
        'removeLastChar',
        $strings
    );

    return implode(' ', $trimmedStrings);
}

function removeLastChar(string $str, string $character = '!'): string
{
    if ($character !== $str[strlen($str) - 1]) {
        return $str;
    }

    return removeLastChar(substr($str, 0, strlen($str) - 1));
}
