<?php
declare(strict_types=1);

//https://www.codewars.com/kata/6329d94bf18e5d0e56bfca77/train/php

/**
 * @param int $memorySize
 * @param int[] $referenceList
 * @return int[]
 */
function getLeastRecentlyUsed(int $memorySize, array $referenceList): array
{
    $memory = [];
    $ratio = 0;

    $recentlyUsedPagesRatios = array_fill(0, $memorySize, 0);

    for ($i = 0; $i < count($referenceList); $i++) {
        if ($referenceList[$i] < 0) {
            continue;
        }

        if (count($memory) < $memorySize) {
            if (!in_array($referenceList[$i], $memory)) {
                $memory[] = $referenceList[$i];
            }
            setRatio($recentlyUsedPagesRatios, getMemoryKey($memory, $referenceList[$i]), ++$ratio);
        } else {
            if (!in_array($referenceList[$i], $memory)) {
                $updateKey = getLeastUsedPageKey($recentlyUsedPagesRatios);
                $memory[$updateKey] = $referenceList[$i];
                setRatio($recentlyUsedPagesRatios, $updateKey, ++$ratio);
            } else {
                setRatio($recentlyUsedPagesRatios, getMemoryKey($memory, $referenceList[$i]), ++$ratio);
            }
        }
    }

    setEmptyMemorySlots($memory, $memorySize);

    return $memory;
}

/**
 * @param int[] $array
 * @param int $index
 * @param int $increment
 * @return void
 */
function setRatio(array &$array, int $index, int $increment): void
{
    $array[$index] = $increment;
}

/**
 * @param int[] $array
 * @param int $value
 * @return int
 */
function getMemoryKey(array $array, int $value): int
{
    return array_search($value, $array);
}

/**
 * @param int[] $array
 * @return int
 */
function getLeastUsedPageKey(array $array): int
{
    $min = $array[0];
    $key = 0;

    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] <= $min) {
            $min = $array[$i];
            $key = $i;
        }
    }

    return $key;
}

/**
 * @param int[] $memory
 * @param int $memorySize
 * @return void
 */
function setEmptyMemorySlots(array &$memory, int $memorySize): void
{
    if (count($memory) < $memorySize) {
        for ($i = count($memory); $i < $memorySize; $i++) {
            $memory[] = -1;
        }
    }
}
