<?php

use App\task048\altVersion\Entity\Maze;
use App\task048\altVersion\Entity\MazeRunner;

$mazeArray = [
    [1, 1, 1, 1, 1, 1, 1],
    [1, 0, 0, 0, 0, 0, 3],
    [1, 0, 1, 0, 1, 0, 1],
    [0, 0, 1, 0, 0, 0, 1],
    [1, 0, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 0, 1],
    [1, 2, 1, 0, 1, 0, 1]
];

$maze = new Maze($mazeArray);
$runner = new MazeRunner($maze);

$directions = ["N", "N", "N", "N", "N", "E", "E", "E", "E", "E"];

$result = $runner->run($directions);

echo $result;
