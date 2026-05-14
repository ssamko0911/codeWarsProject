<?php declare(strict_types=1);

//https://www.codewars.com/kata/55cacc3039607536c6000081/train/php

use App\task226\Entity\Node;

function insert_nth(Node|null $head, int $index, int $data): Node
{
    if (null === $head) {
        return new Node($data);
    }

    if (0 > $index) {
        throw new InvalidArgumentException('index must be a positive integer.');
    }

    if (0 === $index) {
        return new Node($data, $head);
    }

    $currentNode = $head;

    for ($i = 0; $i < $index - 1; $i++) {
        if (null === $currentNode->getNext()) {
            throw new InvalidArgumentException('index is out of list bounds');
        }

        $currentNode = $currentNode->getNext();
    }

    $currentNode->setNext(new Node($data, $currentNode->getNext()));

    return $head;
}

/** SUBMITTED
 * declare(strict_types=1);
 *
 * function insert_nth(Node|null $head, int $index, int $data): Node
 * {
 * if (null === $head) {
 * return new Node($data);
 * }
 *
 * if (0 > $index) {
 * throw new InvalidArgumentException('index must be a positive integer.');
 * }
 *
 * if (0 === $index) {
 * return new Node($data, $head);
 * }
 *
 * $currentNode = $head;
 *
 * for($i = 0; $i < $index - 1; $i++) {
 * if (null === $currentNode->next) {
 * throw new InvalidArgumentException('index is out of list bounds');
 * }
 *
 * $currentNode = $currentNode->next;
 * }
 *
 * $currentNode->next = new Node($data, $currentNode->next);
 *
 * return $head;
 * }
 */
