<?php declare(strict_types=1);

//https://www.codewars.com/kata/580f6cbcfbf2bec47c000511/train/php
const EMPTY_SPACE = '0';
const HIGHLIGHTED_SPACE = '1';
const POSITION = '*';
const NEXT_LINE = '\n';

/**
 * @param int $rows
 * @param int $cols
 * @param array<string, int> $position
 * @return string
 */
function create_grid(int $rows, int $cols, array $position): string
{
    $grid = '';

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            if (isNotValidPosition($rows, $cols, $position)) {
                $grid .= EMPTY_SPACE;
            } else if ($position['y'] === $i) {
                $grid .= $j === $position['x'] ? POSITION : HIGHLIGHTED_SPACE;
            } elseif ($position['x'] === $j) {
                $grid .= HIGHLIGHTED_SPACE;
            } else {
                $grid .= EMPTY_SPACE;
            }
        }

        if ($i !== $rows - 1) {
            $grid .= NEXT_LINE;
        }
    }

    return $grid;
}

/**
 * @param int $rows
 * @param int $cols
 * @param array<string, int> $position
 * @return bool
 */
function isNotValidPosition(int $rows, int $cols, array $position): bool
{
    return $position['x'] >= $cols || $position['y'] >= $rows;
}
