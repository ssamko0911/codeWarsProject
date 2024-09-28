<?php

declare(strict_types=1);

//https://www.codewars.com/kata/57f625992f4d53c24200070e/train/php

/**
 * @param array<int, array{string, int}> $tickets
 * @param int $win
 * @return bool
 */
function isWinner(array $tickets, int $win): bool
{
    $countMiniWins = 0;

    foreach ($tickets as $ticket) {
        $chars = $ticket[0];
        $match = $ticket[1];

        $tempMiniWin = 0;

        for ($i = 0; $i < strlen($chars); $i++) {
            if (ord($chars[$i]) === $match) {
                $tempMiniWin++;
            }
        }

        if ($tempMiniWin >= 1) {
            $countMiniWins++;
        }
    }

    return $countMiniWins >= $win;
}
