<?php declare(strict_types=1);

//https://www.codewars.com/kata/567fe8b50c201947bc000056/train/php

const PATTERN = '/^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+$/';
function ipv4_address(string $address): bool {
    $filtered = filter_var($address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);

    if (!$filtered) {
        return false;
    }

    return 1 === preg_match(PATTERN, $filtered);
}
