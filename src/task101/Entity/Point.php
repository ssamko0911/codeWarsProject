<?php

declare(strict_types=1);

//https://www.codewars.com/kata/58e46873c45e9af88d00006a/train/php

namespace App\task101\Entity;

class Point
{
    public function __construct(
        public float $x,
        public float $y,
        public float $z
    )
    {
    }

    public static function getOrigin(): Point
    {
        return new Point(0, 0, 0);
    }

    public function getDistanceFromOrigin(): float
    {
        $origin = self::getOrigin();

        return sqrt(
            (pow($this->x - $origin->x, 2)) +
            (pow($this->y - $origin->y, 2)) +
            (pow($this->z - $origin->z, 2))
        );
    }

    public function getDistanceFromPoint(Point $point): float
    {
        return sqrt(
            (pow($this->x - $point->x, 2)) +
            (pow($this->y - $point->y, 2)) +
            (pow($this->z - $point->z, 2))
        );
    }
}
