<?php declare(strict_types=1);

// https://www.codewars.com/kata/5550d638a99ddb113e0000a2/train/php

/**
 * @param scalar[] $items
 * @return scalar[]
 */
function josephus(array $items, int $step): array {
    $index = 0;
    $countedOut = [];

    while (0 !== count($items)) {
        $index = (($index + $step) % count($items)) - 1;

        if ($index < 0) {
            $index = array_key_last($items);
            $countedOut[] = $items[$index];
            array_splice($items, $index, 1);
            $index = 0;
        } else {
            $countedOut[] = $items[$index];
            array_splice($items, $index, 1);
        }
    }

    return $countedOut;
}
