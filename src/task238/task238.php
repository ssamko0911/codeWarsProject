<?php declare(strict_types=1);

// https://www.codewars.com/kata/58f6f87a55d759439b000073/train/php

/**
 * @param array<int, scalar> $val
 */
function negationValue(string $str, array|float|bool|int|string|null $val): bool
{
    return mb_strlen($str) % 2 !== 0 ? !($val) : (bool)$val;
}
