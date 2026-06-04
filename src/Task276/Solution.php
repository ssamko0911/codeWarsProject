<?php declare(strict_types=1);

// https://www.codewars.com/kata/605ae9e1d2be8a0023b494ed/train/php

namespace App\Task276;

final class Solution
{
    public final const int SALUTES_PER_MEETING = 2;
    public final const string PERSON_MOVING_RIGHT = '>';
    public final const string PERSON_MOVING_LEFT = '<';

    public static function count_salutes(string $hallway): int
    {
        $saluteCount = 0;
        $length = strlen($hallway);

        for ($i = 0; $i < $length; $i++) {
            if (self::PERSON_MOVING_RIGHT === $hallway[$i]) {
                $saluteCount += self::SALUTES_PER_MEETING * count(
                    array_filter(
                        str_split(
                            substr($hallway, $i)
                        ),
                        static function (string $char): bool {
                            return self::PERSON_MOVING_LEFT === $char;
                        }
                    )
                );
            }
        }


        return $saluteCount;
    }
}
