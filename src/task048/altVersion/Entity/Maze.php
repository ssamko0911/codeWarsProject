<?php

declare(strict_types=1);

namespace App\task048\altVersion\Entity;

final readonly class Maze
{
    public function __construct(
        private array $grid
    ) {
    }

    public function getCell(int $x, int $y): ?int
    {
        return $this->grid[$y][$x] ?? null;
    }

    public function getStartPosition(): Position
    {
        $pos = array_search(2, array_merge(...$this->grid));
        $y = intdiv($pos, count($this->grid));
        $x = $pos % count($this->grid);

        return new Position($x, $y);
    }
}
