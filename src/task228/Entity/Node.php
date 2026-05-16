<?php declare(strict_types=1);

namespace App\task228\Entity;

final class Node
{
    public function __construct(
        private int $data,
        private ?self $next
    )
    {
    }

    public function getData(): int
    {
        return $this->data;
    }

    public function getNext(): ?self
    {
        return $this->next;
    }

    public function setData(int $data): void
    {
        $this->data = $data;
    }

    public function setNext(?self $next): void
    {
        $this->next = $next;
    }
}

/* SUBMITTED

declare(strict_types=1);

class Node {
  public $data, $next;
  public function __construct($data, $next = NULL) {
    $this->data = $data;
    $this->next = $next;
  }
}

const FAKE_DATA = [
    1,
    2,
    3,
];

function push(?Node $head, int $data): Node
{
    return new Node(
        $data,
        $head
    );
}

function build_one_two_three(): Node
{
    return new Node(
        FAKE_DATA[0],
        new Node(
            FAKE_DATA[1],
            new Node(
                FAKE_DATA[2],
                null
            )
        ),
    );
}

 */