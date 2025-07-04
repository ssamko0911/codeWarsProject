<?php declare(strict_types=1);

//https://www.codewars.com/kata/5b49cc5a578c6ab6b200004c/train/php

/**
 * @param array<int, int|string> $flashPile
 * @param array<int, int|string> $turtlePile
 * @return int
 */
function snap(array $flashPile, array $turtlePile): int
{
    $pile = [];
    $snapCount = 0;
    while (0 !== count($turtlePile)) {
        if (playTurn($flashPile, $flashPile, $pile, $snapCount)) {
            continue;
        };

        playTurn($turtlePile, $flashPile, $pile, $snapCount);
    }

    return $snapCount;
}

/**
 * @param array<int, int|string> $pile
 * @return bool
 */
function isCardEqualsPileLastCard(array $pile): bool
{
    return $pile[count($pile) - 1] === $pile[count($pile) - 2];
}

/**
 * @param array<int, int|string> $playerPile
 * @param array<int, int|string> $flashPile
 * @param array<int, int|string> $pile
 * @param int $snapCount
 * @return bool
 */
function playTurn(array &$playerPile, array &$flashPile, array &$pile, int &$snapCount): bool
{
    $card = array_shift($playerPile);
    $pile[] = $card;

    if (count($pile) > 1 && isCardEqualsPileLastCard($pile)) {
        $flashPile = [...$flashPile, ...$pile];
        $snapCount++;
        $pile = [];

        return true;
    }

    return false;
}
