<?php declare(strict_types=1);

use App\task273\Entity\CarPark;
use App\task273\Entity\Driver;

require_once __DIR__ . '/../../vendor/autoload.php';

// https://www.codewars.com/kata/591eab1d192fe0435e000014/train/php

/**
 * @param array<int, int[]> $carpark
 * @return string[]
 */
function escape(array $carpark) : array {
    return (new Driver(new CarPark($carpark)))->logMoves();
}
