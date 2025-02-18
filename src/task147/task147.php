<?php

declare(strict_types=1);

//https://leetcode.com/problems/valid-palindrome/

function isPalindrome(string $str): bool
{
    if (0 === strlen($str)) {
        return true;
    }

    $filteredString = preg_replace("#[[:punct:]]#", "", $str);

    return trim(str_replace(' ', '', strtolower($filteredString))) ===
        strrev(trim(str_replace(' ', '', strtolower($filteredString))));
}
