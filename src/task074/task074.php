<?php

declare(strict_types=1);

//https://leetcode.com/problems/add-two-numbers/

/**
 * @param int[] $listOne
 * @param int[] $listTwo
 * @return int[]
 */
function addTwoNumbers(array $listOne, array$listTwo): array
{
    $numberOne = getNumberAsString($listOne);
    $numberTwo = getNumberAsString($listTwo);

    $sum = intval($numberOne) + intval($numberTwo);

    return str_split(strrev(strval($sum)));
}

function getNumberAsString(array $number): string
{
    return implode('', array_reverse($number));
}

print_r(addTwoNumbers([9,9,9,9,9,9,9], [9,9,9,9]));