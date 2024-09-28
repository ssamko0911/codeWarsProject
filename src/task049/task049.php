<?php

declare(strict_types=1);

//https://www.codewars.com/kata/59752e1f064d1261cb0000ec/train/php

const DEGREES_TO_HOUR = 30.0;
const DEGREES_TO_MINUTES = 0.5;
const DEFAULT_NOON_VALUE = 12;
const TWO_DIGITS_START = 10;

function getCurrentTime(float $angle): string
{
    $hours = getHours($angle);
    $minutes = getMinutes($angle, $hours);

    if ($hours === 0) {
        $hours = DEFAULT_NOON_VALUE;
    }

    return sprintf('%s:%s', getTimeAsString($hours), getTimeAsString($minutes));
}

function getHours(float $angle): int
{
    return intval($angle / DEGREES_TO_HOUR);
}

function getMinutes(float $angle, int $hours): float
{
    $minutesAngle = ($angle - ($hours * DEGREES_TO_HOUR));

    return $minutesAngle !== 0.0 ? floor(($minutesAngle) / DEGREES_TO_MINUTES) : 0;
}

function getTimeAsString(int|float $value): string
{
    return $value < TWO_DIGITS_START ? "0$value" : "$value";
}
