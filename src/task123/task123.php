<?php

declare(strict_types = 1);

//https://www.codewars.com/kata/515f51d438015969f7000013/train/php

/**
 * @param int $number
 * @return array<int, int[]>
 */
function pyramid(int $number): array {
    $counter = 1;
    $pyramid = [];

    while ($counter !== $number + 1) {
        $pyramid[] = array_fill(0, $counter, 1);
        $counter++;
    }

    return $pyramid;
}
