<?php

declare(strict_types=1);

//https://www.codewars.com/kata/52f78966747862fc9a0009ae/train/php

const OPERATORS = [
    'add' => '+',
    'subtract' => '-',
    'multiply' => '*',
    'divide' => '/',
];

function calculate(string $expression): float
{
    $expressionAsArray = explode(' ', $expression);

    $calculated = [];

    foreach ($expressionAsArray as $item) {
        if (is_numeric($item)) {
            $calculated[] = $item;
        } else {
            $operandOne = array_pop($calculated);
            $operandTwo = array_pop($calculated);

            switch ($item) {
                case OPERATORS['add']:
                    $calculated[] = $operandTwo + $operandOne;
                    break;
                case OPERATORS['subtract']:
                    $calculated[] = $operandTwo - $operandOne;
                    break;
                case OPERATORS['multiply']:
                    $calculated[] = $operandTwo * $operandOne;
                    break;
                case OPERATORS['divide']:
                    $calculated[] = $operandTwo / $operandOne;
                    break;
            }
        }
    }

    return current($calculated);
}
