<?php declare(strict_types=1);

namespace App\task212\model;
class Node
{
    public $data, $next;

    public function __construct($data, $next = NULL)
    {
        $this->data = $data;
        $this->next = $next;
    }

    public function length($head): int
    {
        if (null === $head) {
            return 0;
        }

        $length = 1;

        while (null !== $head->next) {
            $length++;
            $head = $head->next;
        }

        return $length;
    }
}

/**
 * recursive approach:
 *
 * function length($l) {
 *     return is_null($l) ? 0 : 1 + length($l->next);
 * }
 */
