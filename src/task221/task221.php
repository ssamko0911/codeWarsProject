<?php declare(strict_types=1);

//https://www.codewars.com/kata/5ea39ab1d8425e0029fcd035/train/php

const PING = 'ping';
const PONG = 'pong';
const BAD_SHOT_KEY = 'lastBadShot';
const SEPARATOR = '-';

function pingPong(string $sounds): string
{
    $ralliesStrings = explode(SEPARATOR, $sounds);
    $ralliesWithShots = getRalliesAsArrays($ralliesStrings);
    $scores = getTotalScoreAsArray($ralliesWithShots);

    if ($scores[PING] > $scores[PONG]) {
        return PING;
    } elseif ($scores[PONG] > $scores[PING]) {
        return PONG;
    } else {
        return $scores[BAD_SHOT_KEY] === PING ? PONG : PING;
    }
}

/**
 * @param string[] $rallies
 * @return array<int, array<int, string>>
 */
function getRalliesAsArrays(array $rallies): array
{
    $allowed = [
        PING => true,
        PONG => true,
    ];

    $ralliesArray = [];
    $currentRally = [];

    foreach ($rallies as $rally) {
        if (isset($allowed[$rally])) {
            $currentRally[] = $rally;
        } else {
            if ([] !== $currentRally) {
                $ralliesArray[] = $currentRally;
                $currentRally = [];
            }
        }
    }

    if ([] !== $currentRally) {
        $ralliesArray[] = $currentRally;
    }

    return $ralliesArray;
}

/**
 * @param array<int, array<int, string>> $ralliesWithShots
 * @return array<string, int|string>
 */
function getTotalScoreAsArray(array $ralliesWithShots): array
{
    $scores = [
        PING => 0,
        PONG => 0,
        BAD_SHOT_KEY => '',
    ];

    for ($i = 0; $i < count($ralliesWithShots); $i++) {
        $serve = $ralliesWithShots[$i][0];
        $win = $ralliesWithShots[$i][count($ralliesWithShots[$i]) - 1] === PING ? PONG : PING;

        if ($serve === $win) {
            $scores[$win]++;
        }

        $scores[BAD_SHOT_KEY] = $ralliesWithShots[$i][count($ralliesWithShots[$i]) - 1];
    }

    return $scores;
}
