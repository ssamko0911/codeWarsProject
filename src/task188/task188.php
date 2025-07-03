<?php declare(strict_types = 1);

//https://www.codewars.com/kata/529e2e1f16cb0fcccb000a6b/train/php

function split_integer(int $num, int $parts): array {
    $array = [];

    if ($num > $parts) {
        $res = (int) ($num / $parts);
        $array = array_fill(0, $parts, $res);
        if ($num % $parts !== 0) {
            for ($i = count($array) - 1; $i >= 0; $i--) {
                $array[$i] += 1;
                if (array_sum($array) === $num) {
                    return $array;
                }
            }
        }
    } else {

        $remainder = $parts - $num;
        $res = (int) ($num / $remainder);
        $array = [...array_fill(0, $remainder, 0), ...array_fill($remainder, $parts, $res)];
    }

    return $array;
}

//print_r(split_integer(20,6));
