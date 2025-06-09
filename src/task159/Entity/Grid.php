<?php

declare(strict_types = 1);

namespace App\task159\Entity;
final class Grid
{
    public function __construct(
        /** @var array<int, array<int, string>> */
        private array $grid
    )
    {
    }

    public function getCell(int $x, int $y): string
    {
        return $this->grid[$x][$y];
    }

    public function getStartingPosition(): Position
    {
        $position = array_search('x', array_merge(...$this->grid));
        $x = intdiv($position, count($this->grid));
        $y = $position % count($this->grid);

        return new Position($x, $y);
    }
}
