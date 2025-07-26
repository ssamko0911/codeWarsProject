<?php declare(strict_types=1);

//https://www.codewars.com/kata/585cf93f6ad5e0d9bf000010/train/php

const PIN = 'I';
const HIT = ' ';
/**
 * @param int[] $hits
 * @return string
 */
function bowlingPins(array $hits): string
{
    $rowTemplates = [
        "%s\n",
        " %s \n",
        "  %s  \n",
        "   %s   ",
    ];

    $pinPositions = [
        [7, 8, 9, 10],
        [4, 5, 6],
        [2, 3],
        [1],
    ];

    $pins = '';

    for ($i = 0; $i < count($pinPositions); $i++) {
        $row = array_map(static function ($pin) use ($hits): string {
            return in_array($pin, $hits) ? HIT : PIN;
        }, $pinPositions[$i]);

        $pins .= sprintf($rowTemplates[$i], implode(' ', $row));
    }

    return $pins;
}
