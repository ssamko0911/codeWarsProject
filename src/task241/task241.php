<?php declare(strict_types=1);

// https://www.codewars.com/kata/581c6b075cfa83852700021f/train/php

use App\task241\Entity\Node;

/**
 * @param scalar $value
 */
function index_of(?Node $head, mixed $value): int {
    if (null === $head) {
        return -1;
    }

    $index = 0;
    $current = $head;

    while (null !== $current->next) {
        if ($value === $current->data) {
            return $index;
        }

        $current = $current->next;
        $index++;
    }

    return $value === $current->data ? $index : -1;
}
