<?php declare(strict_types=1);

namespace App\task213\Model;

use InvalidArgumentException;

class Node
{
    public $data, $next;

    public function __construct($data, $next = NULL)
    {
        $this->data = $data;
        $this->next = $next;
    }

    public function get_nth(Node|null $head, int $index)
    {
        $copiedNode = $head;
        $currentNodeIndex = 0;

        while ($currentNodeIndex !== $index && null !== $copiedNode) {
            $copiedNode = $copiedNode->next;
            $currentNodeIndex++;
        }

        if (null === $copiedNode) {
            throw new InvalidArgumentException('Empty head');
        }

        return $copiedNode->data;
    }
}
