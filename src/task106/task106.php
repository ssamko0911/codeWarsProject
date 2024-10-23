<?php

declare(strict_types=1);

//https://www.codewars.com/kata/52597aa56021e91c93000cb0/train/php

/**
 * @param array $items
 * @return array
 */
function moveZeros(array $items): array
{
    $zeroes = [];
    foreach ($items as $key => $value) {
        if ($value === 0 || $value === 0.0) {
            $zeroes[] = intval($value);
            unset($items[$key]);
        }
    }

    foreach ($zeroes as $zero) {
        $items[] = $zero;
    }

    return array_values($items);
}
