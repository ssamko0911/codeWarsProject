<?php declare(strict_types=1);

namespace App\task226\Entity;

final class Node
{
    public function __construct(
        private int $data,
        private ?self $next = null
    ) {

    }

    public function getData(): int
    {
        return $this->data;
    }

    public function setData(int $data): void
    {
        $this->data = $data;
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }

    public function setNext(?Node $next): void
    {
        $this->next = $next;
    }
}
