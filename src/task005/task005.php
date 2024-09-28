<?php

declare(strict_types=1);

//https://www.codewars.com/kata/57eb8fcdf670e99d9b000272/train/php

function high($x): string
{
    $words = explode(' ', $x);

    $highScore = 0;
    $winner = '';

    for ($i = 0; $i < count($words); $i++) {
        $tempScore = 0;
        $tempWinner = '';
        for ($j = 0; $j < strlen($words[$i]); $j++) {
            $tempScore += ord($words[$i][$j]) - 96;
            $tempWinner = $words[$i];
        }

        if ($tempScore > $highScore) {
            $highScore = $tempScore;
            $winner = $tempWinner;
        }
    }

    return $winner;
}
