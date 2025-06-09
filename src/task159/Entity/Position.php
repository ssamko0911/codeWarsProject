<?php

declare(strict_types = 1);

namespace App\task159\Entity;

class Position
{
    public function __construct(
        public int $x,
        public int $y,
    )
    {
    }

    public function move(string $direction): void
    {
        // the edge shifts are unclear;
        [$dx, $dy] = match ($direction) {
            'up' => [-1, 0],
            'down' => [1, 0],
            'right' => [0, 1],
            'left' => [0, -1],
            default => [0, 0],
        };

        $this->x += $dx;
        $this->y += $dy;
    }
}
