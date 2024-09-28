<?php

declare(strict_types=1);

//https://www.codewars.com/kata/55b4d87a3766d9873a0000d4/train/php

const BOATS_QUANTITY = 7;
const CARS_QUANTITY = 9;

const CHANGE_BOATS = 2;
const CHANGE_CARS = 1;

/**
 * @param int $moneyFrom
 * @param int $moneyTo
 * @return string[]
 */
function getAsset(int $moneyFrom, int $moneyTo): array
{
    $amountValues = range($moneyFrom, $moneyTo);

    $filteredAmount = array_filter($amountValues, function ($amount) {
        return is_int(($amount - CHANGE_BOATS) / BOATS_QUANTITY) && is_int(($amount - CHANGE_CARS) / CARS_QUANTITY);
    });

    $assets = [];

    foreach ($filteredAmount as $amount) {
        $assets[] = getAssetAsArray($amount);
    }

    return $assets;
}

function getQuantityCars(int $money): int
{
    return ($money - CHANGE_CARS) / CARS_QUANTITY;
}

function getQuantityBoats(int $money): int
{
    return ($money - CHANGE_BOATS) / BOATS_QUANTITY;
}

function getAssetAsArray(int $amount): array
{
    $boats = getQuantityBoats($amount);
    $cars = getQuantityCars($amount);

    return [
        "M: $amount",
        "B: $boats",
        "C: $cars",
    ];
}
