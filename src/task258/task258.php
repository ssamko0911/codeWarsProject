<?php declare(strict_types=1);

// https://www.codewars.com/kata/525caa5c1bf619d28c000335/train/php

const VICTORY_STREAKS = [
    [[0, 0], [0, 1], [0, 2]],
    [[1, 0], [1, 1], [1, 2]],
    [[2, 0], [2, 1], [2, 2]],
    [[0, 0], [1, 0], [2, 0]],
    [[0, 1], [1, 1], [2, 1]],
    [[0, 2], [1, 2], [2, 2]],
    [[0, 0], [1, 1], [2, 2]],
    [[0, 2], [1, 1], [2, 0]],
];

const VICTORY_STREAK_LENGTH = 3;
const PLAYER_X_ID = 1;
const PLAYER_O_ID = 2;

/**
 * @param array<int, int[]> $board
 */
function is_solved(array $board): int
{
    $xPlayerMoves = getPlayerMoves($board, PLAYER_X_ID);
    $oPlayerMoves = getPlayerMoves($board, PLAYER_O_ID);

    $countVictoryMovesX = 0;
    $countVictoryMovesO = 0;

    foreach (VICTORY_STREAKS as $win) {
        if (VICTORY_STREAK_LENGTH === $countVictoryMovesX) {
            break;
        }

        $countVictoryMovesX = 0;

        if (VICTORY_STREAK_LENGTH === $countVictoryMovesO) {
            break;
        }

        $countVictoryMovesO = 0;

        foreach ($win as $item) {
            if (in_array($item, $xPlayerMoves, true)) {
                $countVictoryMovesX++;
            }

            if (in_array($item, $oPlayerMoves, true)) {
                $countVictoryMovesO++;
            }
        }
    }

    if (VICTORY_STREAK_LENGTH === $countVictoryMovesX) {
        return PLAYER_X_ID;
    }

    if (VICTORY_STREAK_LENGTH === $countVictoryMovesO) {
        return PLAYER_O_ID;
    }

    if (hasEmptySpots($board)) {
        return -1;
    }

    return 0;
}

/**
 * @param array<int, int[]> $board
 * @return array<int, int[]>
 */
function getPlayerMoves(array $board, int $playerId): array
{
    $moves = [];

    $length = count($board);

    foreach ($board as $x => $value) {
        for ($y = 0; $y < $length; $y++) {
            if ($value[$y] === $playerId) {
                $moves[] = [$x, $y];
            }
        }
    }

    return $moves;
}

/**
 * @param array<int, int[]> $board
 */
function hasEmptySpots(array $board): bool
{
    foreach ($board as $item) {
        if (in_array(0, $item, true)) {
            return true;
        }
    }

    return false;
}

/** THE AWESOME ONE!!!
 * function is_solved(array $board): int {
 *
 * $solutions = [
 * $board[0][0] . $board[1][1] . $board[2][2], // Diagonal 1
 * $board[0][2] . $board[1][1] . $board[2][0], // Diagonal 2
 * $board[0][0] . $board[0][1] . $board[0][2], // Horizontal 1
 * $board[1][0] . $board[1][1] . $board[1][2], // Horizontal 2
 * $board[2][0] . $board[2][1] . $board[2][2], // Horizontal 3
 * $board[0][0] . $board[1][0] . $board[2][0], // Vertical 1
 * $board[0][1] . $board[1][1] . $board[2][1], // Vertical 2
 * $board[0][2] . $board[1][2] . $board[2][2]  // Vertical 3
 * ];
 *
 * if(in_array("111", $solutions)) return 1;
 * if(in_array("222", $solutions)) return 2;
 * foreach($solutions as $solution)
 * if(strpos($solution, "0")) return -1;
 *
 * return 0;
 * }
 */
