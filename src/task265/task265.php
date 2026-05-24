<?php declare(strict_types=1);

// https://www.codewars.com/kata/582041237df353e01d000084/train/php

use App\task265\Entity\Node;

function filter(?Node $head, callable $fn): ?Node
{
    if (null === $head) {
        return null;
    }

    $current = $head;
    $filtered = [];

    while (null !== $current) {
        if ($fn($current->data)) {
            $filtered[] = new Node($current->data);
        }

        $current = $current->next;
    }

    $length = count($filtered);
    for ($i = 1; $i < $length; $i++) {
        $filtered[$i - 1]->next = $filtered[$i];
    }


    return [] !== $filtered ? $filtered[array_key_first($filtered)] : null;
}

// NICE ONE
/**
 * function filter($head, $p) {
 * if ($head !== null) {
 * return $p($head->data) ? new Node($head->data, filter($head->next, $p)) : filter($head->next, $p);
 * }
 * return null;
 * }
 */