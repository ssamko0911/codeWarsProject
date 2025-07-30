<?php declare(strict_types=1);

//https://www.codewars.com/kata/57fb04649610ce369a0006b8/train/php

const EXCLAMATION_MARK = '!';

function remove(string $str): string
{
    $words = explode(' ', $str);
    $equalised = [];

    foreach ($words as $word) {
        $wordAsArray = explode(EXCLAMATION_MARK, $word);

        $wordPart = array_filter($wordAsArray, static function($word): bool {
            return '' !== $word;
        });

        $index = array_keys($wordPart)[0];

        $startExMarks = $index;
        $endExMarks = count($wordAsArray) - $index - 1;

        $exMarksCount = min($startExMarks, $endExMarks);

        $equalised[] = str_repeat(EXCLAMATION_MARK, $exMarksCount) . $wordAsArray[$index] . str_repeat(EXCLAMATION_MARK, $exMarksCount);
    }

    return implode(' ', $equalised);
}

//echo remove("Hi!") . PHP_EOL;
//echo remove("!Hi! Hi!") . PHP_EOL;
//echo remove("!!Hi! !Hi!!") . PHP_EOL;
echo remove("!!!!Hi!! !!!!Hi !Hi!!!") . PHP_EOL;