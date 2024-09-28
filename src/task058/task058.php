<?php

declare(strict_types=1);

//https://www.codewars.com/kata/55b3425df71c1201a800009c/train/php

const MILLISECONDS_UNIT = 1000;
const TIME_UNIT = 60;

function statAssoc(string $str): string
{
    if (strlen($str) === 0) {
        return '';
    }

    $timeAsArray = explode(',', $str);
    $cleanedTimeRecords = array_map('cleanTimeValue', $timeAsArray);
    $timeRecordsMilliseconds = array_map('getMilliseconds', $cleanedTimeRecords);
    sort($timeRecordsMilliseconds);

    $range = getRangeAsString($timeRecordsMilliseconds);
    $mean = getMeanAsString($timeRecordsMilliseconds);
    $median = getMedianAsString($timeRecordsMilliseconds);

    return getStatisticsAsString($range, $mean, $median);
}

function cleanTimeValue(string $time): string
{
    $cleaned = trim($time);

    return ltrim($cleaned, '0');
}

function getMilliseconds(string $time): int
{
    list($hours, $minutes, $seconds) = explode('|', $time);
    return ((intval($hours) * TIME_UNIT * TIME_UNIT) + (intval($minutes * TIME_UNIT)) + intval($seconds)) * MILLISECONDS_UNIT;
}

/**
 * @param int $milliseconds
 * @return string[]
 */
function getTimeFromMilliseconds(int $milliseconds): array
{
    $seconds = floor($milliseconds / MILLISECONDS_UNIT);
    $minutes = floor($seconds / TIME_UNIT);
    $hours = floor($minutes / TIME_UNIT);

    return [
        'hours' => $hours < 10 ? "0$hours" : "$hours",
        'minutes' => $minutes % TIME_UNIT < 10 ? "0" . $minutes % TIME_UNIT : $minutes % TIME_UNIT,
        'seconds' => $seconds % TIME_UNIT < 10 ? "0" . $seconds % TIME_UNIT : $seconds % TIME_UNIT,
    ];
}

/**
 * @param int[] $timeMilliseconds
 * @return int
 */
function getRangeInMilliseconds(array $timeMilliseconds): int
{
    return max($timeMilliseconds) - min($timeMilliseconds);
}

/**
 * @param int[] $timeMilliseconds
 * @return int
 */
function getMeanInMilliseconds(array $timeMilliseconds): int
{
    return (int) (array_sum($timeMilliseconds) / count($timeMilliseconds));
}

/**
 * @param int[] $timeMilliseconds
 * @return int
 */
function getMedianInMilliseconds(array $timeMilliseconds): int
{
    if (count($timeMilliseconds) % 2 === 0) {
        $secondHalfLength = count($timeMilliseconds) / 2;
        $firstHalfLength = $secondHalfLength - 1;

        $firstHalfValue = $timeMilliseconds[$firstHalfLength];
        $secondHalfValue = $timeMilliseconds[$secondHalfLength];

        $median = ($firstHalfValue + $secondHalfValue) / 2;
    } else {
        $length = count($timeMilliseconds) / 2;
        $medianIndex = (int)$length;
        $median = $timeMilliseconds[$medianIndex];
    }

    return $median;
}

/**
 * @param int[] $timeMilliseconds
 * @return string
 */
function getRangeAsString(array $timeMilliseconds): string
{
    $range = getRangeInMilliseconds($timeMilliseconds);
    $rangeAsTime = getTimeFromMilliseconds($range);
    return sprintf("%s|%s|%s", $rangeAsTime['hours'], $rangeAsTime['minutes'], $rangeAsTime['seconds']);
}

/**
 * @param int[] $timeMilliseconds
 * @return string
 */
function getMeanAsString(array $timeMilliseconds): string
{
    $mean = getMeanInMilliseconds($timeMilliseconds);
    $meanAsTime = getTimeFromMilliseconds($mean);
    return sprintf("%s|%s|%s", $meanAsTime['hours'], $meanAsTime['minutes'], $meanAsTime['seconds']);
}

/**
 * @param int[] $timeMilliseconds
 * @return string
 */
function getMedianAsString(array $timeMilliseconds): string
{
    $median = getMedianInMilliseconds($timeMilliseconds);
    $medianAsTime = getTimeFromMilliseconds($median);
    return sprintf("%s|%s|%s", $medianAsTime['hours'], $medianAsTime['minutes'], $medianAsTime['seconds']);
}

function getStatisticsAsString(string $range, string $mean, string $median): string
{
    return sprintf("Range: %s Average: %s Median: %s", $range, $mean, $median);
}
