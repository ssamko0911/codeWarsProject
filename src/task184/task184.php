<?php declare(strict_types=1);

//https://www.codewars.com/kata/5884b6550785f7c58f000047/train/php

/**
 * @param int[] $numbers
 * @return array<int, int[]>
 */
function group(array $numbers): array
{
    if (0 === count($numbers)) {
        return [];
    }

    $grouped = [];

    while (0 !== count($numbers)) {
        $temp[] = array_shift($numbers);
        $unset = [];

        for ($j = 0; $j < count($numbers); $j++) {
            if ($temp[0] === $numbers[$j]) {
                $temp[] = $numbers[$j];
                $unset[] = $j;
            }
        }

        foreach ($unset as $key) {
            unset($numbers[$key]);
        }

        $numbers = array_values($numbers);
        $grouped[] = $temp;
        $temp = [];
    }

    return $grouped;
}
