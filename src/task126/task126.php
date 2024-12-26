<?php

//https://www.codewars.com/kata/523f5d21c841566fde000009/train/php

declare(strict_types = 1);

/**
 * @param int[] $arrayOne
 * @param int[] $arrayTwo
 * @return int[]
 */
function arrayDiff(array $arrayOne, array $arrayTwo): array
{
    if ([] === $arrayOne) {
        return [];
    }

    return array_values(array_diff($arrayOne, $arrayTwo));
}
