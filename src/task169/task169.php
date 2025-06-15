<?php declare(strict_types=1);

//https://www.codewars.com/kata/59d9d8cb27ee005972000045/train/php

const EMPTY_DATA = 'Nothing';
const NAME_TAG = 'name';
const PRICE_TAG = 'prx';
const QUANTITY_TAG = 'qty';
const REPORT_CURRENCY = '$';

function getCatalogDataByItem(string $catalog, string $item): string
{
    $report = '';
    $catalogAsArray = getCatalogAsArray($catalog);

    if (0 === count($catalogAsArray)) {
        return EMPTY_DATA;
    }

    $rawData = preg_grep("/{$item}/", $catalogAsArray);

    if (0 === count($rawData)) {
        return EMPTY_DATA;
    }

    foreach ($rawData as $rawDataItem) {
        $report .= generateReportLine($rawDataItem);
    }

    return trim($report);
}

/**
 * @return string[]
 */
function getCatalogAsArray(string $catalog): array
{
    $catalogAsArray = explode("\n", $catalog);

    return array_values(
        array_filter($catalogAsArray,
            static function (string $item): bool {
                return 1 !== strlen($item);
            }
        )
    );
}

function getTagValue(string $catalogLine, string $tag): string
{
    preg_match("#<{$tag}>(.*?)</{$tag}>#", $catalogLine, $matches, PREG_OFFSET_CAPTURE);
    $value = $matches[1][0];

    return PRICE_TAG === $tag ? REPORT_CURRENCY . $value : $value;
}

function generateReportLine(string $rawDataItem): string
{
    return sprintf("%s > %s: %s %s: %s\n",
        getTagValue($rawDataItem, NAME_TAG),
        PRICE_TAG,
        getTagValue($rawDataItem, PRICE_TAG),
        QUANTITY_TAG,
        getTagValue($rawDataItem, QUANTITY_TAG)
    );
}
