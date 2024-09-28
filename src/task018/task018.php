<?php

declare(strict_types=1);

//https://www.codewars.com/kata/59df2f8f08c6cec835000012/train/php

function meeting(string $str): string
{
    $friends = explode(';', strtoupper($str));

    $invitees = [];

    foreach ($friends as $friend) {
        $fullNames = explode(':', $friend);
        $invitees[] = addFirstAndLastName($fullNames);
    }

    $invitees = sortInvitees($invitees);

    return getInviteesAsString($invitees);
}

/**
 * @param string[] $fullNames
 * @return array<string, string>
 */
function addFirstAndLastName(array $fullNames): array
{
    return [
        'firstName' => $fullNames[0],
        'lastName' => $fullNames[1],
    ];
}

/**
 * @param array<string, string> $invitees
 * @return array<string, string>
 */
function sortInvitees(array $invitees): array
{
    $firstName = array_column($invitees, 'firstName');
    $lastName = array_column($invitees, 'lastName');
    array_multisort($lastName, SORT_STRING, $firstName, SORT_STRING, $invitees);

    return $invitees;
}

/**
 * @param string[] $invitees
 * @return string
 */
function getInviteesAsString(array $invitees): string
{
    $stringResult = '';
    foreach ($invitees as $invitee) {
        $stringResult .= sprintf("(%s, %s)", $invitee['lastName'], $invitee['firstName']);
    }

    return $stringResult;
}
