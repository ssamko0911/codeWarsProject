<?php declare(strict_types=1);

use App\task240\Entity\Node;

function map(?Node $head, callable $fn): ?Node
{
    if (null === $head) {
        return null;
    }

    $currentNode = $head;
    $nodes = [];

    while (null !== $currentNode->next) {
        $nodes[] = new Node($fn($currentNode->data));
        linkNodes($nodes);
        $currentNode = $currentNode->next;
    }

    $nodes[] = new Node($fn($currentNode->data));
    linkNodes($nodes);

    return $nodes[array_key_first($nodes)];
}

/** @param Node[] $nodes */
function linkNodes(array &$nodes): void
{
    if (2 <= count($nodes)) {
        $nodes[array_key_last($nodes) - 1]->next = $nodes[array_key_last($nodes)] ?? null;
    }
}
