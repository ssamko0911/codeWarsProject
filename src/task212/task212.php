<?php declare(strict_types=1);

// https://www.codewars.com/kata/59006675bb1fb31ae400012b/train/php

const TOTAL_DEGREES = 360;
const DECIMALS = 2;

/**
 * @throws JsonException
 */
function pieChart(string $obj): string
{
    $objAsArray = json_decode($obj, true, 512, JSON_THROW_ON_ERROR);
    $sum = array_sum($objAsArray);

    $data = array_map(static function ($item) use ($sum): string {
        return number_format(($item * TOTAL_DEGREES) / $sum, DECIMALS);
    }, $objAsArray);

    return json_encode($data, JSON_THROW_ON_ERROR);
}
