<?php

declare(strict_types=1);

//https://leetcode.com/problems/reverse-string/

function reverseString(&$stringAsArray): void
{
    $reversed = array_reverse($stringAsArray);

    $stringAsArray = $reversed;
}
