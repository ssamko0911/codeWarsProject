<?php

declare(strict_types=1);

//https://www.codewars.com/kata/58485a43d750d23bad0000e6/train/php

const MINUTES_IN_HOUR = 60;
const MINUTES_IN_HALF_HOUR = 30;
const TWELVE_HOURS = 12;
const ZERO_TIME = '00';
const LABELS = [
    'fizz' => 'Fizz',
    'buzz' => 'Buzz',
    'fizzBuzz' => 'Fizz Buzz',
    'tick' => 'tick',
    'cuckoo' => 'Cuckoo',
];

function fizzBuzzCuckooClock(string $time): string
{
    $timeAsArray = getTimeAsArray($time);

    if (0 === $timeAsArray['minutes'] % 3 && 0 === $timeAsArray['minutes'] % 5) {
        return getHourlyBasedString($timeAsArray);
    } elseif (0 === $timeAsArray['minutes'] % 3) {
        return sprintf('%s', LABELS['fizz']);
    } elseif (0 === $timeAsArray['minutes'] % 5) {
        return sprintf('%s', LABELS['buzz']);
    } else {
        return sprintf('%s', LABELS['tick']);
    }
}

/**
 * @param string $time
 * @return int[]
 */
function getTimeAsArray(string $time): array
{
    $timeAsArray = explode(':', $time);

    $hours = parseTimeString($timeAsArray[0], true);
    $minutes = parseTimeString($timeAsArray[1]);

    return [
        'hours' => $hours,
        'minutes' => $minutes,
    ];
}

function parseTimeString(string $time, bool $isHours = false): int
{
    if (ZERO_TIME === $time && $isHours) {
        return 0;
    }

    if (ZERO_TIME === $time && !$isHours) {
        return MINUTES_IN_HOUR;
    }

    if (str_starts_with($time, '0')) {
        return (int)substr($time, 1);
    }

    return (int)$time;
}

/**
 * @param int[] $timeAsArray
 * @return string
 */
function getHourlyBasedString(array $timeAsArray): string
{
    if ($timeAsArray['minutes'] === MINUTES_IN_HOUR) {
        return sprintf('%s', rtrim(
                str_repeat(
                    LABELS['cuckoo'] . ' ',
                    0 === $timeAsArray['hours'] ? TWELVE_HOURS : convertHours($timeAsArray['hours'])
                )
            )
        );
    } elseif ($timeAsArray['minutes'] === MINUTES_IN_HALF_HOUR) {
        return sprintf('%s', LABELS['cuckoo']);
    } else {
        return sprintf('%s', LABELS['fizzBuzz']);
    }
}
function convertHours(int $hours): int
{
    if ($hours > TWELVE_HOURS) {
        return $hours - TWELVE_HOURS;
    }

    return $hours;
}
