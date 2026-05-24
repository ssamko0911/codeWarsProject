<?php declare(strict_types=1);

// https://www.codewars.com/kata/581c867a33b9fe732e000076/train/php

use App\task261\Entity\Node;

/**
 * @param scalar $value
 */
function last_index_of(?Node $head, mixed $value): int
{
    $lastIndexOfValue = -1;
    $current = $head;
    $index = 0;

    while (null !== $current) {
        if ($value === $current->data) {
            $lastIndexOfValue = $index;
        }

        $current = $current->next;
        $index++;
    }

    return $lastIndexOfValue;
}
