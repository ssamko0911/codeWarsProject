<?php declare(strict_types=1);

// https://www.codewars.com/kata/55caef80d691f65cb6000040/train/php

function geometric_sequence_elements(int $start, int $const, int $sequenceLength): string
{
    $sequenceString = '';
    $lastValue = $start;

    for ($i = 0; $i < $sequenceLength; $i++) {
        $sequenceString .= $lastValue;
        $lastValue *= $const;
        $sequenceString .= $i === $sequenceLength - 1 ? '' : ', ';
    }

    return $sequenceString;
}
