<?php declare(strict_types=1);

//https://www.codewars.com/kata/58a6568827f9546931000027/train/php

const CONTROL_SUM = 10;
function number_of_carries(int $numberOne, int $numberTwo): int
{
    $counter = 0;
    $hasCarry = false;

    $operandOne = strrev((string) max($numberOne, $numberTwo));
    $operandTwo = strrev((string) min($numberOne, $numberTwo));

    for ($i = 0; $i < strlen($operandOne); $i++) {
        if ($hasCarry) {
            $incrementedOperand = ((int) $operandOne[$i]) + 1;
            $hasCarry = false;
        } else {
            $incrementedOperand = (int) $operandOne[$i];
        }

        $sum = $incrementedOperand + (isset($operandTwo[$i]) ? (int) $operandTwo[$i] : 0);

        if ($sum >= CONTROL_SUM) {
            $hasCarry = true;
            $counter++;
        }
    }

    return $counter;
}
