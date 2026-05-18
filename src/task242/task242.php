<?php declare(strict_types=1);

// https://www.codewars.com/kata/58902f676f4873338700011f/train/php

const TICKET_NUMBER_LENGTH = 6;
const PATTERN = '/\D/';
const CHUNK_SIZE = 3;

function isLucky(string $ticket): bool
{
    if (TICKET_NUMBER_LENGTH !== strlen($ticket)) {
        return false;
    }

    if (1 === preg_match(PATTERN, $ticket)) {
        return false;
    }

    $chunks = array_chunk(str_split($ticket), CHUNK_SIZE);

    return array_sum($chunks[array_key_first($chunks)]) ===
        array_sum($chunks[array_key_last($chunks)]);
}
