<?php declare(strict_types=1);

// https://www.codewars.com/kata/58f5c63f1e26ecda7e000029/train/php

/**
 * @return string[]
 */
function wave(string $people): array
{
    if (empty($people)) {
        return [];
    }

    $peopleCopy = $people;
    $mexicanWave = [];
    $length = strlen($people);

    for ($i = 0; $i < $length; $i++) {
        if (' ' === $peopleCopy[$i]) {
            continue;
        }

        $peopleCopy[$i] = strtoupper($people[$i]);
        $mexicanWave[] = $peopleCopy;
        $peopleCopy = $people;
    }

    return $mexicanWave;
}
