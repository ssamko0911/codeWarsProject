<?php

declare(strict_types=1);

//https://www.codewars.com/kata/526571aae218b8ee490006f4/train/php

const CHAR_COUNT = '1';

function countBits(int $number): int
{
    $bitsAsString = decbin($number);

    return substr_count($bitsAsString, CHAR_COUNT);
}
