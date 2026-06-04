<?php declare(strict_types=1);

// https://www.codewars.com/kata/58856a06760b85c4e6000055/train/php

namespace App\Task277;

final class Solution
{
    public final const string ODDS = 'odds win';
    public final const string EVENS = 'evens win';
    public final const string TIE = 'tie';

    /**
     * @param int[] $numbers
     */
    public static function bitsBattle(array $numbers): string
    {
        $odds = 0;
        $evens = 0;

        foreach ($numbers as $number) {
            if (0 === $number) {
                continue;
            }

            if (1 === $number % 2) {
                $odds += substr_count(decbin($number), '1');
            } else {
                $evens += substr_count(decbin($number), '0');
            }
        }

        return match (true) {
            $odds > $evens => self::ODDS,
            $odds < $evens => self::EVENS,
            default => self::TIE,
        };
    }
}
