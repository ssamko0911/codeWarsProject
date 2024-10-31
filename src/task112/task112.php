<?php

declare(strict_types=1);

//https://www.codewars.com/kata/56baeae7022c16dd7400086e/train/php

const EXCEPTION_STRINGS = [
    'notFound' => 'Error => Not found:',
    'tooMany' => 'Error => Too many people:',
];

const PATTERNS = [
    'phoneNumber' => '/[0-9]{1,2}[\-][0-9]{3}[\-][0-9]{3}[\-][0-9]{4}/',
    'personName' => '/<(.*?)>/',
    'cleanAddress' => '/[^A-Za-z0-9 .-]/',
];

const RECORD_IDENTIFIERS = [
    'phoneStartsWith' => '+',
    'nameBraceStart' => '<',
    'nameBraceEnd' => '>',
];

function getPhoneBookRecord(string $phoneBook, string $phoneNumber): string
{
    $phoneBookAsArray = explode(PHP_EOL, $phoneBook);

    $match = getRecordsByPhone($phoneBookAsArray, $phoneNumber);

    if (0 === count($match)) {
        return sprintf('%s %s', EXCEPTION_STRINGS['notFound'], $phoneNumber);
    }

    if (1 < count($match)) {
        return sprintf('%s %s', EXCEPTION_STRINGS['tooMany'], $phoneNumber);
    }

    $phone = getRecordPhone(current($match));
    $name = getRecordName(current($match));
    $address = getRecordAddress(current($match), $phone, $name);

    return sprintf('Phone => %s, Name => %s, Address => %s', $phone, $name, $address);
}

/**
 * @param string[] $phoneBook
 * @param string $phoneNumber
 * @return string[]
 */
function getRecordsByPhone(array $phoneBook, string $phoneNumber): array
{
    $records = [];

    foreach ($phoneBook as $record) {
        if (getRecordPhone($record) === $phoneNumber) {
            $records[] = $record;
        }
    }

    return $records;
}

/**
 * @param string $record
 * @return string
 */
function getRecordPhone(string $record): string
{
    preg_match(PATTERNS['phoneNumber'], $record, $matches);

    return $matches[0] ?? '';
}

/**
 * @param string $record
 * @return string
 */
function getRecordName(string $record): string
{
    preg_match(PATTERNS['personName'], $record, $matches);

    return $matches[1] ?? '';
}

function getRecordAddress(string $record, string $phone, string $name): string
{
    $address = extractAddressFromRecord($record, [
        'phone' => $phone,
        'name' => $name,
    ]);

    $addressAsArray = explode(' ', $address);

    $cleaned = array_map(function ($value) {
        return trim(preg_replace(PATTERNS['cleanAddress'], ' ', $value));
    }, $addressAsArray);

    return implode(' ', array_filter($cleaned));
}

/**
 * @param string $record
 * @param array<string, string> $remove
 * @return string
 */
function extractAddressFromRecord(string $record, array $remove): string
{
    $cleanedAddress = removePhoneFromRecord($record, $remove['phone']);

    return removeNameFromRecord($cleanedAddress, $remove['name']);
}

function removePhoneFromRecord(string $record, string $phone): string
{
    $fullPhoneNumber = RECORD_IDENTIFIERS['phoneStartsWith'] . $phone;

    return str_replace($fullPhoneNumber, '', $record);
}

function removeNameFromRecord(string $record, string $name): string
{
    $fullNameRecord = RECORD_IDENTIFIERS['nameBraceStart'] . $name . RECORD_IDENTIFIERS['nameBraceEnd'];

    return trim(str_replace($fullNameRecord, '', $record));
}
