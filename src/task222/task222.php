<?php declare(strict_types=1);

//https://www.codewars.com/kata/5906436806d25f846400009b/train/php

const SHAPE_CHAR = 'o';
const EMPTY_CHAR = ' ';

function drawShapeX(int $height): string
{
    $shape = '';

    for ($i = 0; $i < $height; $i++) {
        for ($j = 0; $j < $height; $j++) {
            if ($j === $i || $j === $height - $i - 1) {
                $shape .= SHAPE_CHAR;
            } else {
                $shape .= EMPTY_CHAR;
            }
        }

        if ($i !== $height - 1) {
            $shape .= "\n";
        }
    }

    return $shape;
}
