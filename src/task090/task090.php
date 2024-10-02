<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5287e858c6b5a9678200083c/train/php

function isNarcissistic(int $value): bool
{
    $numberAsString = str_split(strval($value));
    $base = count($numberAsString);

    return $value === array_sum(
            array_map(
                function ($digit) use ($base) {
                    return pow($digit, $base);
                }, $numberAsString
            )
        );
}
