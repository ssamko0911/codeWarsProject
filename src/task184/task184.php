<?php declare(strict_types=1);

//https://www.codewars.com/kata/5884b6550785f7c58f000047/train/php

/**
 * @param int[] $numbers
 * @return array<int, int[]>
 */
function group(array $numbers): array
{
    if (0 === count($numbers)) {
        return [];
    }


    $data = array_count_values($numbers);

    $grouped = [];

    foreach ($data as $key => $item) {
        $grouped[] = array_fill(0, $item, $key);
    }

//    $grouped = [];
//    $arrayLength = count($numbers);
//
//    foreach ($numbers as $key => $number) {
//        if (!isUnique($grouped, $number)) {
//            continue;
//        }
//
//        $occurrences[] = $number;
//
//        for ($j = $key + 1; $j < $arrayLength; $j++) {
//            if ($number === $numbers[$j]) {
//                $occurrences[] = $numbers[$j];
//            }
//        }
//
//        $grouped[] = $occurrences;
//        $occurrences = [];
//    }

    return $grouped;
}

function isUnique(array $grouped, int $number): bool
{
    foreach ($grouped as $group) {
        if (in_array($number, $group, true)) {
            return false;
        }
    }

    return true;
}


//print_r(group([3, 2, 6, 2, 1, 3]));
//print_r(group([3, 2, 6, 2]));
//print_r(group([10,-10,5,-3,-9,-6,-3,3,5,-7,0,1,10,-9,-6,7,-3,-6,8,3,9,-2,5,-2,-7,4,-10,-10,1,4]));
print_r(group([20,15,15,17,20,10,19,16,15,14]));