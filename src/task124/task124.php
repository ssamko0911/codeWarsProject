<?php

declare(strict_types=1);

//https://www.codewars.com/kata/515decfd9dcfc23bb6000006/train/php

const OCTET_RANGE = [
    'start' => 0,
    'end' => 255,
];
const DOT_SEPARATOR_NUMBER = 3;
function isValidIP(string $ipAddress): bool
{
    if (empty($ipAddress)) {
        return false;
    }

    if (substr_count($ipAddress, '.') !== DOT_SEPARATOR_NUMBER) {
        return false;
    }

    $octets = explode(".", $ipAddress);

    foreach ($octets as $octet) {
        if (!isValidOctet($octet)) {
            return false;
        }
    }

    return true;
}

function isValidOctet(string $octet): bool
{
    if (($octet[0] === '0' || $octet[0] === ' ') && 1 < strlen($octet)) {
        return false;
    }

    if (str_starts_with($octet, '0')) {
        return false;
    }

    return in_array((int)$octet, range(OCTET_RANGE['start'], OCTET_RANGE['end']));
}
