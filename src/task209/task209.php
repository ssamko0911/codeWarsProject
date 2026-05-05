<?php declare(strict_types=1);

// https://www.codewars.com/kata/5356ad2cbb858025d800111d/train/php

/**
 * @param string[] $names
 * @return string[]
 */
function capMe(array $names): array
{
    return array_map(
        static function (string $name): string {
            return ucfirst(
                strtolower(
                    $name
                )
            );
        },
        $names
    );
}
