<?php declare(strict_types=1);

//https://www.codewars.com/kata/5410c0e6a0e736cf5b000e69/train/php

function hamming(string $firstString, string $secondString): int
{
    $strLen = strlen($firstString);
    $countDiff = 0;

    for ($i = 0; $i < $strLen; $i++) {
        if ($firstString[$i] !== $secondString[$i]) {
            $countDiff++;
        }
    }

    return $countDiff;
}
