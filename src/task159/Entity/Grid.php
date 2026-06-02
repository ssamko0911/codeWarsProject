<?php declare(strict_types=1);

namespace App\task159\Entity;

use DomainException;

final class Grid
{
    private const string START_POS_SYMBOL = 'x';

    public function __construct(
        /** @var array<int, string[]> */
        private readonly array $grid
    ) {
    }

    public function getCell(int $x, int $y): string
    {
        return $this->grid[$x][$y];
    }

    public function getStartingPosition(): Position
    {
        if ([] === $this->grid) {
            throw new DomainException('Grid cannot be empty');
        }

        $position = array_search(
            self::START_POS_SYMBOL,
            array_merge(...$this->grid),
            true
        );

        if (false === $position || is_string($position)) {
            throw new DomainException('Invalid position');
        }

        $x = intdiv($position, count($this->grid));
        $y = $position % count($this->grid[array_key_first($this->grid)]);

        return new Position($x, $y);
    }
}
