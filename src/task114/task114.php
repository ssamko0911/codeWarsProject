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

    $applesToShare = array_filter($apples, function ($value) use ($applesPerChild) {
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
    if ($applesPerChild % 2 === 0) {
        return getOddOrEvenCount($apples, true) === 0;
    }

    return getOddOrEvenCount($apples) === 0;
}

/**
 * @param int[] $items
 * @param bool $isEven
 * @return int
 */
function getOddOrEvenCount(array $items, bool $isEven = false): int
{
    return count(
        array_filter($items, static function ($item) use ($isEven): bool {
            return $isEven ? $item % 2 !== 0 : $item % 2 === 0;
        })
    );
}
