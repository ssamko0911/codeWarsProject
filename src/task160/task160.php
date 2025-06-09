<?php

declare(strict_types = 1);

// https://www.codewars.com/kata/517abf86da9663f1d2000003/train/php

function toCamelCase(string $str): string
{
    $filtered = explode(' ',
        str_replace(['_', '-'], ' ', $str)
    );

    for ($i = 0; $i < count($filtered); $i++) {
        $filtered[$i] = capitalize($filtered[$i], $i);
    }

    return implode('', $filtered);
}

function capitalize(string $str, int $index): string
{
    if ($index === 0) {
        return $str;
    }

    return ucfirst($str);
}
