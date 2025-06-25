<?php declare(strict_types=1);

//https://www.codewars.com/kata/5a420163b6cfd7cde5000077/train/php

const RESULT_STRING = '%s:W=%d;D=%d;L=%d;Scored=%d;Conceded=%d;Points=%d';
const NOT_PLAYED = '%s:This team didn\'t play!';
const FLOAT_SCORE_ERROR = 'Error(float number):%s';
const POINTS = 3;
function nbaCup(string $resultSheet, string $teamToFind): string
{
    if (0 === strlen($teamToFind)) {
        return '';
    }

    $win = 0;
    $draw = 0;
    $loss = 0;
    $points = 0;
    $scored = 0;
    $conceded = 0;

    $gameResults = explode(',', $resultSheet);

    $filteredGameResults = getGameResultsByTeam($gameResults, $teamToFind);

    if (0 === count($filteredGameResults)) {
        return sprintf(NOT_PLAYED, $teamToFind);
    }

    foreach ($filteredGameResults as $result) {
        preg_match_all('/([A-Za-z0-9 ]+?) (\d+(?:\.\d+)?)(?= [A-Z]|$)/', $result, $matches, PREG_SET_ORDER);

        $gameResultAsArray = [];

        foreach ($matches as $match) {
            $team = trim($match[1]);
            $scoreValue = $match[2];

            if (str_contains($scoreValue, '.')) {
                return sprintf(FLOAT_SCORE_ERROR, $result);
            } else {
                $score = (int)$scoreValue;
            }

            $gameResultAsArray[$team] = $score;
        }

        $scored += $gameResultAsArray[$teamToFind];
        $otherTeam = getOpponentTeam($gameResultAsArray, $teamToFind);

        if ($gameResultAsArray[$teamToFind] === $gameResultAsArray[$otherTeam]) {
            $draw++;
        }

        if ($gameResultAsArray[$teamToFind] > $gameResultAsArray[$otherTeam]) {
            $win++;
            $points += POINTS;
        }

        if ($gameResultAsArray[$teamToFind] < $gameResultAsArray[$otherTeam]) {
            $loss++;
        }

        $conceded += $gameResultAsArray[$otherTeam];
    }

    return sprintf(RESULT_STRING, $teamToFind, $win, $draw, $loss, $scored, $conceded, $points);
}

/**
 * @param string[] $gameResults
 * @param string $team
 * @return string[]
 */
function getGameResultsByTeam(array $gameResults, string $team): array
{
    $filteredGameResults = [];

    foreach ($gameResults as $gameResult) {
        $match = preg_match('/\b' . preg_quote($team, '/') . '\b/', $gameResult);
        if ($match) {
            $filteredGameResults[] = $gameResult;
        }
    }

    return $filteredGameResults;
}

/**
 * @param array<string, int> $gameResultAsArray
 * @param string $team
 * @return string
 */
function getOpponentTeam(array $gameResultAsArray, string $team): string
{
    return array_values(
        array_filter(
            array_keys($gameResultAsArray), static function ($item) use ($team): bool {
            return $item !== $team;
        })
    )[0];
}
