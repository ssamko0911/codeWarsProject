<?php declare(strict_types=1);

//https://www.codewars.com/kata/586a1af1c66d18ad81000134/train/php

const SURNAME_LIMIT = 5;
const PADDING_CHAR = '9';
const FEMALE = 'F';
const FEMALE_DRIVER_INCREMENT = 50;
const DRIVING_LICENCE_PATTERN = '%s%s%s%s9AA';
/**
 * @param string[] $data
 */
function driver(array $data): string
{
    return generateDriverLicenceId(
        forename: $data[0],
        middleName: $data[1],
        surname: $data[2],
        birthDate: $data[3],
        gender: $data[4],
    );
}

function generateDriverLicenceId(
    string $forename,
    string $middleName,
    string $surname,
    string $birthDate,
    string $gender
): string
{
    return sprintf(DRIVING_LICENCE_PATTERN,
        getSurnameChars($surname),
        getDecadeChars($birthDate),
        getBirthDateChars($birthDate, $gender),
        getFirstMiddleNameChars($forename, $middleName),
    );
}

function getSurnameChars(string $surname): string
{
    return
        (SURNAME_LIMIT < mb_strlen($surname)) ?
            strtoupper(substr($surname, 0, SURNAME_LIMIT)) :
            strtoupper(str_pad($surname, SURNAME_LIMIT, PADDING_CHAR));
}

function getDecadeChars(string $date): string
{
    return substr((string)date_parse($date)['year'], -2, 1);
}

function getBirthDateChars(string $birthDate, string $gender): string
{
    $date = DateTimeImmutable::createFromFormat('d-M-Y', $birthDate);

    if ($date === false) {
        throw new RuntimeException('Invalid date: ' . $birthDate);
    }

    $month = (int)$date->format('m');
    $monthEncoded = match (true) {
        FEMALE === $gender => sprintf('%02d', $month + FEMALE_DRIVER_INCREMENT),
        default => sprintf('%02d', $month)
    };

    return $monthEncoded . $date->format('d') . $date->format('Y')[3];
}

function getFirstMiddleNameChars(string $firstName, string $middleName): string
{
    $encoded = mb_substr($firstName, 0, 1);

    return '' === $middleName ? $encoded . PADDING_CHAR : $encoded . mb_substr($middleName, 0, 1);
}

$data = ["Andrew", "Robert", "Lee", "02-September-1981", "M"];
$data2 = ["Johanna", "", "Gibbs", "13-Dec-1981", "F"];

echo driver($data) . PHP_EOL;
echo driver($data2) . PHP_EOL;
