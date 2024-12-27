<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5a9c35e9ba1bb5c54a0001ac/train/php

function add (int $operandOne, int $operandTwo): int
{
    while ($operandTwo !== 0) {
        $carry = $operandOne & $operandTwo;
        $operandOne ^= $operandTwo;
        $operandTwo = $carry << 1;
    }

    return $operandOne;
}
