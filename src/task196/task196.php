<?php declare(strict_types=1);

//https://www.codewars.com/kata/5894318275f2c75695000146/train/php

function deleteDigit(int $number): int
{
    $numberAsArray = str_split((string) $number);
    $length = count($numberAsArray);
    $max = 0;

    for ($i = 0; $i < $length; $i++) {
        $temp = $numberAsArray;
        unset($temp[$i]);
        $num = (int) implode($temp);

        if ($num > $max) {
            $max = $num;
        }
    }

    return $max;
}
