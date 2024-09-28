<?php

declare(strict_types=1);

namespace App\task048\RouteValidator;

use App\task048\Entity\MazeRunner;
use App\task048\Enum\PositionCode;

final readonly class RouteValidator
{
    public function validateCurrentPositionAsDead(MazeRunner $mazeRunner): bool
    {
        $isDeadByOutOfMaze = $mazeRunner->getCurrentPosition() === PositionCode::OUT->value;

        if ($isDeadByOutOfMaze) {
            return true;
        }

        $currentPosition = $mazeRunner->getCurrentPosition();
        $maze = $mazeRunner
            ->getMap()
            ->getMaze();
        $isDeadByWall = $maze[$currentPosition['y']][$currentPosition['x']] === PositionCode::WALL->value;

        if ($isDeadByWall) {
            return true;
        }

        return false;
    }

    public function validateCurrentPositionAsFinish(MazeRunner $mazeRunner): bool
    {
        $currentPosition = $mazeRunner->getCurrentPosition();
        $maze = $mazeRunner
            ->getMap()
            ->getMaze();

        if ($maze[$currentPosition['y']][$currentPosition['x']] === PositionCode::FINISH->value) {
            return true;
        }

        return false;
    }


    public function validateStepCount(MazeRunner $mazeRunner): bool
    {
        $totalStepMade = $mazeRunner->getStepCount();
        $stepLimit = $mazeRunner->getStepLimit();

        if ($totalStepMade >= $stepLimit && !$this->validateCurrentPositionAsFinish($mazeRunner)) {
            return true;
        }

        return false;
    }
}
