<?php

declare(strict_types=1);

//https://www.codewars.com/kata/58663693b359c4a6560001d6/train/php

use App\task048\Entity\Map;
use App\task048\Entity\MazeRunner;
use App\task048\Enum\GameResult;
use App\task048\RouteValidator\RouteValidator;

function maze_runner($maze, $directions): string
{
    $maze = new Map($maze, $directions);

    $mazeRunner = new MazeRunner($maze, count($maze->getRoute()));

    $mazeRunner->setCurrentPosition($mazeRunner->getInitialPosition($mazeRunner->getMap()->getMaze()));

    $routeValidator = new RouteValidator();

    foreach ($mazeRunner->getMap()->getRoute() as $stepDirection) {
        $mazeRunner->setCurrentPosition(
            $mazeRunner->makeStep(
                $stepDirection,
                $mazeRunner->getCurrentPosition(),
                $mazeRunner
                    ->getMap()
                    ->getMaze()
            )
        );

        if ($routeValidator->validateCurrentPositionAsDead($mazeRunner)) {
            return GameResult::DEAD->value;
        }

        if ($routeValidator->validateCurrentPositionAsFinish($mazeRunner)) {
            return GameResult::FINISH->value;
        }
    }

    if ($routeValidator->validateStepCount($mazeRunner)){
        return GameResult::LOST->value;
    }

    return GameResult::FINISH->value;
}
