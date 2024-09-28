<?php

declare(strict_types=1);

//https://www.codewars.com/kata/54bf1c2cd5b56cc47f0007a1/train/php

function duplicateCount(string $text): int
{
    $chars = getCharsAsArray($text);
    $duplicated = getDuplicatedChars($chars);

    return count($duplicated);
}

/**
 * @param string $str
 * @return array<string, int>
 */
function getCharsAsArray(string $str): array
{
    return array_count_values(str_split(strtolower($str)));
}

/**
 * @param array<string, int> $chars
 * @return array<string, int>
 */
function getDuplicatedChars(array $chars): array
{
    return array_filter($chars, function ($char) {
        return $char > 1;
    });
}
