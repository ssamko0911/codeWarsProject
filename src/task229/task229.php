<?php declare(strict_types=1);

// https://www.codewars.com/kata/55d17ddd6d7868493e000074/train/php

use App\task229\Entity\Node;

function append(?Node $listA, ?Node $listB): ?Node
{
    return match (true) {
        (null === $listA && null === $listB) => null,
        null === $listA => $listB,
        null === $listB => $listA,
        default => new Node (
            $listA->data,
            append($listA->next, $listB)
        )
    };
}