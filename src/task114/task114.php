<?php

declare(strict_types=1);

//https://www.codewars.com/kata/596f1bdeda9b3b0297000018/train/php

const APPLES_TRANSFER_AMOUNT = 2;

/**
 * @param int[] $apples
 * @return int|bool
 */
function minSteps(array $apples): int|bool
{
    if (0 !== array_sum($apples) % count($apples)) {
        return false;
    }

    $applesPerChild = array_sum($apples) / count($apples);

    if (!isValidInput($apples, $applesPerChild)) {
        return false;
    }

    $steps = 0;

    $applesToShare = array_filter($apples, static function (int $value) use ($applesPerChild): bool {
        return $value !== $applesPerChild;
    });

    foreach ($applesToShare as $applesAmount) {
        $difference = $applesPerChild - min($applesAmount, $applesPerChild);
        $steps += $difference / APPLES_TRANSFER_AMOUNT;
    }

    return $steps;
}

/**
 * @param int[] $apples
 * @param int $applesPerChild
 * @return bool
 */
function isValidInput(array $apples, int $applesPerChild): bool
{
    return getOddOrEvenCount($apples, $applesPerChild) === 0;
}

/**
 * @param int[] $items
 * @param int $applesPerChild
 * @return int
 */

function getOddOrEvenCount(array $items, int $applesPerChild): int
{
    return count(
        array_filter($items, static function ($item) use ($applesPerChild): bool {
            return $applesPerChild % 2 === 0 ? $item % 2 !== 0 : $item % 2 === 0;
        })
    );
}
