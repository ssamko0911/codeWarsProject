<?php

declare(strict_types = 1);

//https://leetcode.com/problems/length-of-last-word/

function lengthOfLastWord(string $string): int
{
    $words = explode(' ', trim($string));

    return strlen($words[count($words) - 1]);
}
