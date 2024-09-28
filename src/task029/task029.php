<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5938f5b606c3033f4700015a/train/php

const LEFT_SIDE_SCORES = [
    'w' => 4,
    'p' => 3,
    'b' => 2,
    's' => 1,
];

const RIGHT_SIDE_SCORES = [
    'm' => 4,
    'q' => 3,
    'd' => 2,
    'z' => 1,
];

function getWinner(string $fight): string
{
    $survived = removeExplodedLetter($fight);

    echo $survived . PHP_EOL;
    $leftScore = getScores(extractLetter($survived), LEFT_SIDE_SCORES);
    $rightScore = getScores(extractLetter($survived), RIGHT_SIDE_SCORES);

    if ($leftScore === $rightScore) {
        return 'Let\'s fight again!';
    }

    return $leftScore > $rightScore ? 'Left side wins!' : 'Right side wins!';
}

function removeExplodedLetter(string $str): string
{
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] === '*'
            && $i !== strlen($str) - 1
            && $i !== 0
        ) {
            $str[$i + 1] = '_';
            $str[$i - 1] = '_';
        }
    }

    return $str;
}

/**
 * @param string $str
 * @return string[]
 */
function extractLetter(string $str): array
{
    preg_match_all("/[a-z]/", $str, $extractedLetters);

    return $extractedLetters[0];
}

/**
 * @param string[] $str
 * @param array<string, int> $scores
 * @return int
 */
function getScores(array $str, array $scores): int
{
    $score = 0;
    for ($i = 0; $i < count($str); $i++) {
        if (array_key_exists($str[$i], $scores)) {
            $score += $scores[$str[$i]];
        }
    }

    return $score;
}
