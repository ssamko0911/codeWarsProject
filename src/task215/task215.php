<?php declare(strict_types=1);

//https://www.codewars.com/kata/565c9f5fcabeeaeb5a000052/train/php

const INPUT_PATTERN = '/^([3-9]|\d{2,}) sides of (\d+(?:\.\d+)?) (cm|ft|au|nm|un) each$/';
const INVALID_INPUT = 'Invalid input';
const TRIANGLE = 3;
const SQUARE = 4;
const RESULT_STRING_FORMAT = '%.2f sq.%s';

function area_of_regular_polygon(string $str): string
{
    if (1 !== preg_match(INPUT_PATTERN, $str)) {
        return INVALID_INPUT;
    }

    $data = getInputData($str);

    if (TRIANGLE === $data['sides']) {
        return sprintf(RESULT_STRING_FORMAT, calculateTriangleArea($data), $data['unit']);
    } elseif (SQUARE === $data['sides']) {
        return sprintf(RESULT_STRING_FORMAT, calculateSquareArea($data), $data['unit']);
    } else {
        return sprintf(RESULT_STRING_FORMAT, calculateArea($data), $data['unit']);
    }
}

/**
 * @param string $str
 * @return array<string, int|float|string>
 */
function getInputData(string $str): array
{
    preg_match(INPUT_PATTERN, $str, $matches);

    return [
        'sides' => (int)$matches[1],
        'size' => (float)$matches[2],
        'unit' => $matches[3],
    ];
}

/**
 * @param array<string, int|float|string> $data
 * @return float
 */
function calculateTriangleArea(array $data): float
{
    return (sqrt($data['sides']) * ($data['size'] * $data['size'])) / 4;
}

/**
 * @param array<string, int|float|string> $data
 * @return float
 */
function calculateSquareArea(array $data): float
{
    return $data['size'] * $data['size'];
}

/**
 * @param array<string, int|float|string> $data
 * @return float
 */
function calculateArea(array $data): float
{
    return ($data['size'] * $data['size'] * $data['sides']) / (4 * tan(pi() / $data['sides']));
}
