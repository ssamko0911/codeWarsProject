<?php

declare(strict_types=1);

//https://www.codewars.com/kata/57fb44a12b53146fe1000136/php

const SCORES = [
    '!' => 2,
    '?' => 3,
];

function balance(string $leftString, string $rightString): string
{
    $scoreLeft = getScore($leftString);
    $scoreRight = getScore($rightString);

    if ($scoreLeft === $scoreRight) {
        return 'Balance';
    }

    return $scoreLeft > $scoreRight ? 'Left' : 'Right';
}

function getScore(string $str): int
{
    $score = 0;

    for ($i = 0; $i < strlen($str); $i++) {
        if (array_key_exists($str[$i], SCORES)) {
            $score += SCORES[$str[$i]];
        }
    }

    return $score;
}
