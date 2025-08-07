<?php declare(strict_types=1);

//https://www.codewars.com/kata/58865bfb41e04464240000b0

const ODD_VICTORY = 'odds win';
const EVEN_VICTORY = 'evens win';
const TIE = 'tie';

/**
 * @param int[] $numbers
 * @return string
 */
function bitsWar(array $numbers): string
{
    $odds = [];
    $evens = [];

    foreach ($numbers as $number) {
        ${$number % 2 === 0 ? 'evens' : 'odds'}[] = $number;
    }

    $countOdd = countAllValueOneOccurrences($odds);
    $countEven = countAllValueOneOccurrences($evens);

    if ($countOdd > $countEven) {
        return ODD_VICTORY;
    } elseif ($countOdd < $countEven) {
        return EVEN_VICTORY;
    } else {
        return TIE;
    }
}

/**
 * @param int[] $numbers
 * @return int
 */
function countAllValueOneOccurrences(array $numbers): int
{
    $counter = 0;

    foreach ($numbers as $number) {
        $binAsStr = decbin(abs($number));
        $tempCount = countValueOneInNumber($binAsStr);

        if ($number < 0) {
            $counter += ~$tempCount + 1;
        } else {
            $counter += $tempCount;
        }
    }

    return $counter;
}

/**
 * @param string $number
 * @return int
 */
function countValueOneInNumber(string $number): int
{
    $counter = 0;

    for ($i = 0; $i < strlen($number); $i++) {
        if ('1' === $number[$i]) {
            $counter++;
        }
    }

    return $counter;
}
