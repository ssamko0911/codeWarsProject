<?php

declare(strict_types=1);

namespace App\task048\Entity;

use App\task048\Enum\PositionCode;

final class MazeRunner
{
    private int $stepCount = 0;

    /**
     * @var array<string, int>|int
     */
    private array|int $currentPosition;

    /**
     * @param Map $map
     * @param int $stepLimit
     */
    public function __construct(
        private readonly Map $map,
        private readonly int $stepLimit
    ) {
    }

    public function getStepCount(): int
    {
        return $this->stepCount;
    }

    public function setStepCount(int $stepCount): void
    {
        $this->stepCount = $stepCount;
    }

    public function getMap(): Map
    {
        return $this->map;
    }

    public function getStepLimit(): int
    {
        return $this->stepLimit;
    }

    /**
     * @return array<int, int[]>|int
     */
    public function getCurrentPosition(): array|int
    {
        return $this->currentPosition;
    }

    /**
     * @param array<int, int[]>|int $currentPosition
     * @return void
     */
    public function setCurrentPosition(array|int $currentPosition): void
    {
        $this->currentPosition = $currentPosition;
    }

    /**
     * @param array<int, int[]> $maze
     * @return array<string, int>
     */
    public function getInitialPosition(array $maze): array
    {
        $start = [];
        for ($i = 0; $i < count($maze); $i++) {
            for ($j = 0; $j < count($maze[$i]); $j++) {
                if ($maze[$i][$j] === 2) {
                    $start['x'] = $j;
                    $start['y'] = $i;

                    return $start;
                }
            }
        }

        return $start;
    }

    /**
     * @param string $direction
     * @param array<string, int> $position
     * @param array<int, int[]> $maze
     * @return array<string, int>|int
     */
    public function makeStep(string $direction, array $position, array $maze): array|int
    {
        $nextPosition = [];

        switch ($direction) {
            case 'N':
                if ($position['y'] - 1 < 0) {
                    return PositionCode::OUT->value;
                }

                $nextPosition['x'] = $position['x'];
                $nextPosition['y'] = $position['y'] - 1;
                break;
            case 'S':
                if ($position['y'] + 1 === count($maze)) {
                    return PositionCode::OUT->value;
                }

                $nextPosition['x'] = $position['x'];
                $nextPosition['y'] = $position['y'] + 1;
                break;
            case 'E':
                if ($position['x'] + 1 === count($maze[$position['y']])) {
                    return PositionCode::OUT->value;
                }

                $nextPosition['x'] = $position['x'] + 1;
                $nextPosition['y'] = $position['y'];
                break;
            case 'W':
                if ($position['x'] - 1 < 0) {
                    return PositionCode::OUT->value;
                }

                $nextPosition['x'] = $position['x'] - 1;
                $nextPosition['y'] = $position['y'];
                break;
        }

        $this->setStepCount($this->getStepCount() + 1);

        return $nextPosition;
    }
}
