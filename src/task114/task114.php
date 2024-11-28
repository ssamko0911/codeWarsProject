<?php

declare(strict_types=1);

//https://www.codewars.com/kata/596f1bdeda9b3b0297000018/train/php

/**
 * @param int[] $apples
 * @return int
 */

const APPLES_TRANSFER_AMOUNT = 2;

function minSteps(array $apples): int
{
    if (gettype(array_sum($apples) / count($apples)) !== 'integer') {
        return 0;
    }

    $applesPerChild = array_sum($apples) / count($apples);

    if (!isValidInput($apples, $applesPerChild)) {
        return 0;
    }

    $steps = 0;

    $applesToShare = array_filter($apples, function ($value) use ($applesPerChild) {
        return $value !== $applesPerChild;
    });

    foreach ($applesToShare as $applesAmount) {
        if ($applesAmount < $applesPerChild) {
            $difference = $applesPerChild - $applesAmount;
            $steps += $difference / APPLES_TRANSFER_AMOUNT;
        }
        $difference = $applesAmount - $applesPerChild;
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
    $isEven = $applesPerChild % 2 === 0 ?? false;

    if ($isEven) {
        return count(array_filter($apples, function ($value) {
                    return $value % 2 !== 0;
                })
            ) === 0;
    } else {
        return count(array_filter($apples, function ($value) {
                    return $value % 2 === 0;
                })
            ) === 0;
    }
}
