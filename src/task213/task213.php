<?php declare(strict_types=1);

//https://www.codewars.com/kata/513e08acc600c94f01000001/train/php

const COLOR_RANGE_START = 0;
const COLOR_RANGE_END = 255;

function rgb(int $red, int $green, int $blue): string
{
    $hexFormat = '';
    $colors = [$red, $green, $blue];

    foreach ($colors as $color) {
        if ($color < COLOR_RANGE_START) {
            $color = COLOR_RANGE_START;
        }

        if ($color > COLOR_RANGE_END) {
            $color = COLOR_RANGE_END;
        }

        $hexFormat .= str_pad(dechex($color), 2, (string)COLOR_RANGE_START, STR_PAD_LEFT);
    }


    return strtoupper($hexFormat);
}
