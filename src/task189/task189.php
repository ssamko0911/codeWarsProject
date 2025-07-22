<?php declare(strict_types=1);

//https://www.codewars.com/kata/654c71e6b8466eb3faab7a2c/train/php

const REGULAR_POINTS = 100;

const BONUS = [
    'R' => 500,
    'B' => 300,
    'G' => 200,
];

const BONUS_INS = 3;

/**
 * @param string[] $hoopIns
 * @return int
 */
function prizeCounter(array $hoopIns): int
{
    $blocked = [
        'R' => false,
        'B' => false,
        'G' => false,
    ];

    $score = 0;
    $bonus = [];

    foreach ($hoopIns as $in) {
        if (!$blocked[$in]) {
            $score += REGULAR_POINTS;
        }

        resetBonusArrayOnEveryIn($bonus, $in);

        $bonus[] = $in;

        if (count($bonus) === BONUS_INS && !$blocked[$in]) {
            resetBlockedHoops($blocked, $in);

            $score += BONUS[$in];
            $bonus = [];
        }
    }

    return $score;
}

/**
 * @param string[] $bonus
 * @param string $in
 * @return void
 */
function resetBonusArrayOnEveryIn(array &$bonus, string $in): void
{
    if (0 !== count($bonus)) {
        if ($bonus[count($bonus) - 1] !== $in) {
            $bonus = [];
        }
    }
}

/**
 * @param array<string, bool> $blocked
 * @param string $in
 * @return void
 */
function resetBlockedHoops(array &$blocked, string $in): void
{
    $blocked['R'] = false;
    $blocked['B'] = false;
    $blocked['G'] = false;
    $blocked[$in] = true;
}
