<?php

declare(strict_types=1);

//https://www.codewars.com/kata/586d6cefbcc21eed7a001155/train/php

/**
 * @param string $string
 * @return array<int, int|string>
 */
function longestRepetition(string $string): array
{
    if (empty($string)) {
        return ['', 0];
    }

    $repetitions = getRepetitionsAsArray($string);

    $longestRepetition = getLongestRepetition($repetitions);

    return [$longestRepetition[0], strlen($longestRepetition)];
}

/**
 * @param string $string
 * @return string[]
 */
function getRepetitionsAsArray(string $string): array
{
    $repetition = '';
    $repetitions = [];
    $stringLength = strlen($string);

    for ($i = 0; $i < $stringLength; $i++) {
        $repetition .= $string[$i];

        if ($i === $stringLength - 1 || $string[$i] !== $string[$i + 1]) {
            $repetitions[] = $repetition;
            $repetition = '';
        }
    }

    return $repetitions;
}

/**
 * @param string[] $repetitions
 * @return string
 */
function getLongestRepetition(array $repetitions): string
{
    $longestRepetitionLength = 0;
    $longestRepetition = '';

    foreach ($repetitions as $repetition) {
        if (strlen($repetition) > $longestRepetitionLength) {
            $longestRepetitionLength = strlen($repetition);
            $longestRepetition = $repetition;
        }
    }

    return $longestRepetition;
}
