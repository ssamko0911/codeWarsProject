<?php declare(strict_types=1);

// https://www.codewars.com/kata/5ce969ab07d4b7002dcaa7a1/train/php

function solve(string $str): int
{
    $longestPrefix = 0;

    $match = array_intersect(
        getAffixes($str),
        getAffixes($str, true)
    );

    foreach ($match as $affix) {
        if (mb_strlen($affix) > (mb_strlen($str)) / 2) {
            continue;
        }

        $longestPrefix = max($longestPrefix, mb_strlen($affix));
    }

    return $longestPrefix;
}

/**
 * @return string[]
 */
function getAffixes(string $str, bool $suffix = false): array
{
    $items = [];

    if ('' === $str) {
        return $items;
    }

    $length = mb_strlen($str);

    for ($i = 1; $i < $length; $i++) {
        if ($suffix) {
            $items[] = mb_substr($str, -$i);
        } else {
            $items[] = mb_substr($str, 0, $i);
        }
    }

    return $items;
}

var_dump(solve('abcdabc'));