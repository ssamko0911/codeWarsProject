<?php

declare(strict_types=1);

//https://leetcode.com/problems/add-binary/

function addBinary(string $a, string $b): string
{
    return base_convert((string)(bindec($a) + bindec($b)), 10, 2);
}
