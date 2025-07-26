<?php declare(strict_types=1);

//https://www.codewars.com/kata/59d0ee709f0cbcf65400003b/train/php

const MAP = [
    'AZ' => 'Arizona',
    'CA' => 'California',
    'ID' => 'Idaho',
    'IN' => 'Indiana',
    'MA' => 'Massachusetts',
    'OK' => 'Oklahoma',
    'PA' => 'Pennsylvania',
    'VA' => 'Virginia',
];

const STR_BEGINNING = '..... ';
const STR_SEPARATOR = "\r\n";
const SPACE_PADDING = ' ';

function byState(string $addresses): string
{
    $parts = array_filter(explode("\n", $addresses));

    $grouped = groupLines($parts);

    ksort($grouped);

    foreach ($grouped as &$group) {
        sort($group);
    }

    unset($group);

    $addressBook = '';
    generateAddressBook($addressBook, $grouped);

    return trim($addressBook);
}

/**
 * @param string[] $addressRecords
 * @return array<string, array<int, string>>
 */
function groupLines(array $addressRecords): array
{
    $grouped = [];

    foreach ($addressRecords as $record) {
        $key = substr($record, -2);
        $cleaned = str_replace(',', '', $record);
        $grouped[$key][] = STR_BEGINNING . str_replace($key, MAP[$key], $cleaned) . STR_SEPARATOR;
    }

    return $grouped;
}

/**
 * @param string $addressBook
 * @param array<string, array<int, string>> $sortedAddressGroups
 * @return void
 */
function generateAddressBook(string &$addressBook, array $sortedAddressGroups): void
{
    $first = true;

    foreach ($sortedAddressGroups as $key => $value) {
        if (key_exists($key, MAP)) {
            $addressBook .= ($first ? '' : SPACE_PADDING) . MAP[$key] . STR_SEPARATOR;
            $addressBook .= implode('', $value);
            $first = false;
        }
    }
}
