<?php declare(strict_types=1);

// https://www.codewars.com/kata/58f5c63f1e26ecda7e000029/train/php

/**
 * @param string $people
 * @return string[]
 */
function wave(string $people): array
{
    if (empty($people)) {
        return [];
    }

    $initialString = $people;

    $wave = [];
    $length = strlen($people);

    for ($i = 0; $i < $length; $i++) {
        if (' ' === $initialString[$i]) {
            continue;
        }

        $initialString[$i] = strtoupper($people[$i]);
        $wave[] = $initialString;
        $initialString = $people;
    }

    return $wave;
}
