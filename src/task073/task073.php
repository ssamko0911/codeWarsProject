<?php

declare(strict_types=1);

//https://leetcode.com/problems/palindrome-number/description/

/**
 * @param $x
 * @return bool
 */
function isPalindrome(int $x): bool
{
    return strval($x) === strrev(strval($x));
}
