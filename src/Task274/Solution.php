<?php declare(strict_types=1);

// https://www.codewars.com/kata/567501aec64b81e252000003/train/php

namespace App\Task274;

final class Solution
{
    /** @var string[] */
    const array NUMBERS = [
        "zero",
        "one",
        "two",
        "three",
        "four",
        "five",
        "six",
        "seven",
        "eight",
        "nine",
        "ten",
        "eleven",
        "twelve",
        "thirteen",
        "fourteen",
        "fifteen",
        "sixteen",
        "seventeen",
        "eighteen",
        "nineteen",
        "twenty",
    ];

    const int ROLL_LENGTH = 10;
    const float ROLL_WIDTH = 0.52;
    const float EXTRA_MEASUREMENT_IDX = 1.15;

    public static function wallPaper(float $length, float $width, float $height): ?string
    {
        if (0.0 === $length || 0.0 === $width) {
            return self::NUMBERS[0];
        }

        $rollCoverage = self::ROLL_LENGTH * self::ROLL_WIDTH;
        $areaToCover = ((($length * $height) + ($width * $height)) * 2) * self::EXTRA_MEASUREMENT_IDX;
        $rollsNeeded = (int) (ceil($areaToCover / $rollCoverage));

        return self::NUMBERS[$rollsNeeded] ?? null;
    }
}