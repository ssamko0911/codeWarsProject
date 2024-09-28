<?php

declare(strict_types=1);

namespace App\task048\altVersion\Entity;

class MazeRunner
{
    private Position $position;

    public function __construct(
        private readonly Maze $maze
    )
    {
        $this->position = $this->maze->getStartPosition();
    }

    public function run(array $directions): string
    {
        foreach ($directions as $direction) {
            $this->position->move($direction);

            $cell = $this->maze->getCell($this->position->x, $this->position->y);

            if (1 === $cell) {
                return 'Dead';
            }

            if (3 === $cell) {
                return 'Finish';
            }
        }

        return 'Lost';
    }
}
