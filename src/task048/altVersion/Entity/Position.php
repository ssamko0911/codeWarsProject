<?php

declare(strict_types=1);

namespace App\task048\altVersion\Entity;

class Position
{
    public function __construct(
        public int $x,
        public int $y,
    ) {
    }

    public function move(string $direction): void
    {
        [$dx, $dy] = match ($direction) {
            'N' => [0, -1],
            'S' => [0, 1],
            'W' => [-1, 0],
            'E' => [1, 0],
            default => [0, 0]
        };

        $this->x += $dx;
        $this->y += $dy;
    }
}
