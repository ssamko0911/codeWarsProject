<?php

declare(strict_types=1);

//https://www.codewars.com/kata/590adadea658017d90000039/train/php

function fruit($reels, $spins)
{
    $spinValues = range(1, 10);

    $keys = [
        "Jack",
        "Queen",
        "King",
        "Bar",
        "Cherry",
        "Seven",
        "Shell",
        "Bell",
        "Star",
        "Wild",
    ];

    $points = array_combine($keys, $spinValues);

    $spinValues = [];
    foreach ($reels as $key => $reel) {
        $spinValues[] = $reel[$spins[$key]];
    }

    if (count(array_unique($spinValues)) === 1) {
        return $points[$spinValues[0]] * 10;
    }

    $countValues = array_count_values($spinValues);

    if (count($countValues) === 2) {
        $pairKey = array_keys($countValues, 2)[0];
        $isWild = array_keys($countValues, 1)[0] === 'Wild';

        if ($isWild) {
            return $points[$pairKey] * 2;
        }

        return $points[$pairKey];
    } else {
        return 0;
    }
}
