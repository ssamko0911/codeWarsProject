<?php

declare(strict_types=1);

//https://www.codewars.com/kata/62c376ce1019024820580309/train/php

/**
 * @param string $range
 * @return string[]
 */
function getCellAddresses(string $range): array
{
    $cells = explode(':', $range);

    if (isOneCellRange($cells)) {
        return [];
    }

    $letters = [];
    $digits = [];

    foreach ($cells as $cell) {
        $letters[] = substr($cell, 0, 1);
        $digits[] = substr($cell, 1);
    }

    if (isInvalidLetterRange($letters)) {
        return [];
    }

    $lettersRange = range($letters[0], $letters[1]);
    $digitsRange = range($digits[0], $digits[1]);

    return selectCells($lettersRange, $digitsRange);
}

/**
 * @param string[] $cells
 * @return bool
 */
function isOneCellRange(array $cells): bool
{
    return 1 === count(array_unique($cells));
}

/**
 * @param string[] $letters
 * @return bool
 */
function isInvalidLetterRange(array $letters): bool
{
    return ord($letters[0]) > ord($letters[1]);
}

/**
 * @param string[] $letters
 * @param int[] $digits
 * @return string[]
 */
function selectCells(array $letters, array $digits): array
{
    $selectedCells = [];
    for ($i = 0; $i < count($digits); $i++) {
        for ($j = 0; $j < count($letters); $j++) {
            $selectedCells[] = $letters[$j] . $digits[$i];
        }
    }

    return $selectedCells;
}
