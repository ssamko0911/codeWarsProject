<?php

declare(strict_types=1);

//https://www.codewars.com/kata/598106cb34e205e074000031/php

const PIPER = 'P';
const RAT_STRING_LENGTH = 2;
const RIGHT_DIRECTION_RAT = '~O';
const LEFT_DIRECTION_RAT = 'O~';

function countDeafRats(string $town): int
{
    if (str_starts_with($town, PIPER)) {
        return countDeaf($town, true);
    }

    if (str_ends_with($town, PIPER)) {
        return countDeaf($town);
    }

    $herds = explode(PIPER, $town);
    $leftHeard = countDeaf($herds[0]);
    $rightHeard = countDeaf($herds[1], true);

    return $leftHeard + $rightHeard;
}

function countDeaf(string $town, bool $isPiperPositionStart = false): int
{
    $deafRat = LEFT_DIRECTION_RAT;

    if ($isPiperPositionStart) {
        $deafRat = RIGHT_DIRECTION_RAT;
    }

    $rats = getRatsAsString($town);
    $ratsAsArray = str_split($rats, RAT_STRING_LENGTH);
    $countRats = array_count_values($ratsAsArray);

    if (array_key_exists($deafRat, $countRats)) {
        return $countRats[$deafRat];
    }

    return 0;
}

function getRatsAsString(string $str): string
{
    $str = str_replace(' ', '', $str);

    return str_replace(PIPER, '', $str);
}
