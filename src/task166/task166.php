<?php declare(strict_types=1);

//https://www.codewars.com/kata/5274e122fc75c0943d000148/train/php

const GROUPING_LENGTH = 3;
const GROUP_SEPARATOR = ',';
function groupByCommas(int $number): string
{
    $digitsAsArray = str_split(strrev((string)$number));

    $groupedDigitsAsArray = array_chunk($digitsAsArray, GROUPING_LENGTH);

    $numberAsString = '';

    for ($i = count($groupedDigitsAsArray) - 1; $i >= 0; $i--) {
        $numberAsString .= implode(
            '', array_reverse(
                $groupedDigitsAsArray[$i]
            )
        );

        if (0 !== $i) {
            $numberAsString .= GROUP_SEPARATOR;
        }
    }

    return $numberAsString;
}

groupByCommas(35235235);