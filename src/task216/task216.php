<?php declare(strict_types=1);

//https://www.codewars.com/kata/5c8bf3ec5048ca2c8e954bf3

/**
 * @param string $str
 * @param string $char
 * @return int[]
 */
function shortestToChar(string $str, string $char): array
{
    if ('' === $str) {
        return [];
    }

    $matchingIndexes = getMatchingIndexes($str, $char);

    if (0 === count($matchingIndexes)) {
        return [];
    }

    $distances = [];
    $length = strlen($str);

    for ($i = 0; $i < $length; $i++) {
        if (in_array($i, $matchingIndexes, true)) {
            $distances[] = 0;
            continue;
        }

        $distances[] = getShortestDistance($matchingIndexes, $i);
    }

    return $distances;
}

/**
 * @param string $str
 * @param string $char
 * @return int[]
 */
function getMatchingIndexes(string $str, string $char): array
{
    return array_keys(
        array_filter(str_split($str), static function (string $character) use ($char): bool {
            return $char === $character;
        })
    );
}

/**
 * @param int[] $matchingIndexes
 * @param int $currentIndex
 * @return int
 */
function getShortestDistance(array $matchingIndexes, int $currentIndex): int
{
    $minDistance = abs($matchingIndexes[0] - $currentIndex);

    foreach ($matchingIndexes as $matchingIndex) {
        $distance = $matchingIndex - $currentIndex;

        if (abs($distance) < $minDistance) {
            $minDistance = abs($distance);
        }
    }

    return $minDistance;
}
