<?php declare(strict_types=1);

namespace App\task273\Entity;

use DomainException;

final class CarPark
{
    private const int START = 2;
    private const int STAIRCASE = 1;

    private Position $carPosition;
    private Position $exit;

    public function __construct(
        /** @var array<int, int[]> $layout */
        public array $layout
    ) {
        $this->initLayout();
    }

    private function initLayout(): void
    {
        $this->setExit();
        $this->setCarPosition();
    }

    public function getExit(): Position
    {
        return $this->exit;
    }

    public function getCarPosition(): Position
    {
        return $this->carPosition;
    }

    public function getStaircasePosition(int $floorY): int
    {
        $staircaseX = array_search(self::STAIRCASE, $this->layout[$floorY], true);

        if (false === $staircaseX || is_string($staircaseX)) {
            throw new DomainException('Staircase is absent');
        }

        return $staircaseX;
    }

    private function setExit(): void
    {
        $y = count($this->layout) - 1;
        $x = count($this->layout[$y]) - 1;

        $this->exit = new Position(
            $x, $y
        );
    }

    private function setCarPosition(): void
    {
        $pos = array_search(self::START, array_merge(...$this->layout), true);

        if (false === $pos || is_string($pos)) {
            throw new DomainException('Starting position is not given');
        }

        $x = $pos % count($this->layout[0]);
        $y = intdiv($pos, count($this->layout[0]));

        $this->carPosition =  new Position($x, $y);
    }
}
