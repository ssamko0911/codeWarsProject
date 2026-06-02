<?php declare(strict_types=1);

namespace App\task273\Entity;

final class Position
{
    private const string DESC = 'D';
    private const string LEFT = 'L';
    private const string RIGHT = 'R';

    public function __construct(
        public int $x,
        public int $y,
    )
    {
    }

    public function moveTo(string $direction, int $steps = 1): void
    {
        [$dx, $dy] = match ($direction) {
            self::DESC => [0, $steps],
            self::LEFT => [-$steps, 0],
            self::RIGHT => [$steps, 0],
            default => [0, 0]
        };

        $this->x += $dx;
        $this->y += $dy;
    }

    public function countSteps(int $currentX, int $destinationX): int
    {
        return abs($currentX - $destinationX);
    }
}