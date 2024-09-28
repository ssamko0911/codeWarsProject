<?php

declare(strict_types=1);

//https://www.codewars.com/kata/57f8ff867a28db569e000c4a/train/php

function getKebabCase(string $stringFormatted): string
{
    $result = '';

    $stringFormatted = preg_replace('/[0-9]+/', '', $stringFormatted);

    $words = preg_split('/(?=[A-Z])/',$stringFormatted);

    foreach ($words as $word) {
        $result .= '-' . strtolower($word);
    }

    return trim($result, '-');
}
