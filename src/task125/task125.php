<?php

declare(strict_types = 1);

// https://www.codewars.com/kata/55466989aeecab5aac00003e/train/php

/**
 * @param int $length
 * @param int $width
 * @return int[]|null
 */
function sqInRect(int $length, int $width): array|null
{
    if ($length === $width) {
        return null;
    }

    $squares = [];

    $squares[] = min($length, $width);

    while (($length !== 1 || $width !== 1) && $width <> $length) {
        if ($length > $width) {
            $size = $length - $width;
            $length = $size;
        } else {
            $size = $width - $length;
            $width = $size;
        }

        if ($length !== 1 || $width !== 1) {
            $squares[] = min($length, $width);
        }
    }

    if ($length === 1 || $width === 1) {
        return array_merge(
            $squares, array_fill(
                count($squares), max($length, $width), 1
            )
        );
    }

    return $squares;
}
