<?php

declare(strict_types=1);

//https://www.codewars.com/kata/56a32dd6e4f4748cc3000006/train/php

function getMean(string $town, string $string): float
{
    $rainFallRecords = getPureRainFallRecords($town, $string);

    if ([] === $rainFallRecords) {
        return -1.0;
    } else {
        return array_sum($rainFallRecords) / count($rainFallRecords);
    }
}

function getVariance(string $town, string $string): float
{
    $rainFallRecords = getPureRainFallRecords($town, $string);

    if ([] === $rainFallRecords) {
        return -1.0;
    } else {
        $mean = array_sum($rainFallRecords) / count($rainFallRecords);
        $meanDifference = getMeanDifference($mean, $rainFallRecords);

        return array_sum($meanDifference) / count($meanDifference);
    }
}

/**
 * @param string $str
 * @return string[]
 */
function getRainfallRecordsByCity(string $str): array
{
    return explode(PHP_EOL, $str);
}

/**
 * @param string[] $rainfallRecords
 * @return string[]
 */
function getCities(array $rainfallRecords): array
{
    return array_map(function ($record) {
        return substr($record, 0, strpos($record, ':'));
    }, $rainfallRecords);
}

/**
 * @param string[] $rainfallRecordsByCity
 * @return string[]
 */
function getRainfallRecords(array $rainfallRecordsByCity): array
{
    return array_map(function ($record) {
        return substr($record, (strpos($record, ':')) + 1);
    }, $rainfallRecordsByCity);
}

/**
 * @param string[] $cities
 * @param string[] $rainfallRecordsRaw
 * @return array<string, array<int, string>>
 */
function getCompoundRainfallDataByCity(array $cities, array $rainfallRecordsRaw): array
{
    $rainfallByCity = [];

    foreach ($rainfallRecordsRaw as $key => $monthRainfall) {
        $rainfallByCity[$cities[$key]] = explode(',', $monthRainfall);
    }

    return $rainfallByCity;
}

/**
 * @param string $city
 * @param array<string, array<int, string>> $rainfallByCity
 * @return float[]
 */
function getRainfallAsArray(string $city, array $rainfallByCity): array
{
    return array_map(function ($temperature) {
        return floatval(substr($temperature, (strpos($temperature, ' ')) + 1));
    }, $rainfallByCity[$city]);
}

/**
 * @param float $mean
 * @param float[] $rainfallRecords
 * @return float[]
 */
function getMeanDifference(float $mean, array $rainfallRecords): array
{
    return array_map(function ($rainfall) use ($mean) {
        return pow($rainfall - $mean, 2);
    }, $rainfallRecords);
}

/**
 * @param string $town
 * @param string $string
 * @return float[]|float
 */
function getPureRainFallRecords(string $town, string $string): array|float
{
    $rainfallRecordsByCity = getRainfallRecordsByCity($string);
    $cities = getCities($rainfallRecordsByCity);

    if (empty($town) || !in_array($town, $cities)) {
        return -1.0;
    }

    $rainfallRecordsRaw = getRainfallRecords($rainfallRecordsByCity);
    $rainfallRecordsByCityAndMonth = getCompoundRainfallDataByCity($cities, $rainfallRecordsRaw);
    return getRainfallAsArray($town, $rainfallRecordsByCityAndMonth);
}
