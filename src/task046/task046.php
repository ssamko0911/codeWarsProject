<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5839c48f0cf94640a20001d3/train/php

function land_perimeter($arr) {
    $perimeter = 0;

    foreach ($arr as $item) {
        $perimeter += countX($item);
    }

    return sprintf('Total land perimeter: %d', $perimeter * 3);
}

function countX($str): int
{
    $count = 0;
    for ($i = 0; $i < strlen($str); $i++){
        if ($str[$i] === 'X') {
            $count++;
        }
    }

    return $count;
}

echo land_perimeter([
    "OXOOOX",
    "OXOXOO",
    "XXOOOX",
    "OXXXOO",
    "OOXOOX",
    "OXOOOO",
    "OOXOOX",
    "OOXOOO",
    "OXOOOO",
    "OXOOXX"]
) . PHP_EOL;
echo land_perimeter([
    "OXOOO",
    "OOXXX",
    "OXXOO",
    "XOOOO",
    "XOOOO",
    "XXXOO",
    "XOXOO",
    "OOOXO",
    "OXOOX",
    "XOOOO",
    "OOOXO"
]) . PHP_EOL;

echo land_perimeter(['XOOXO',
    'XOOXO',
    'OOOXO',
    'XXOXO',
    'OXOOO'] ) . PHP_EOL;
