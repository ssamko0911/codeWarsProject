<?php

declare(strict_types=1);

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
