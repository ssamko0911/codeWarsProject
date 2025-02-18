<?php

declare(strict_types=1);

//https://leetcode.com/problems/find-the-index-of-the-first-occurrence-in-a-string/

function getFirstOccurrence(string $haystack, string $needle): int
{
    $occurrence = strpos($haystack, $needle);

    if (false === $occurrence) {
        return -1;
    }

    return $occurrence;
}
