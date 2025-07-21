<?php declare(strict_types=1);

//https://www.codewars.com/kata/5254bd1357d59fbbe90001ec/train/php

const INITIAL_VALUE = 50;
const ADDITIONAL_VALUE = 25;

function get_score(int $number): int
{
    $base = [INITIAL_VALUE];

    while ($number !== count($base)) {
        $base = array_merge($base, array_fill(1, $number - 1, ADDITIONAL_VALUE));
    }

    return $number * array_sum($base);
}
