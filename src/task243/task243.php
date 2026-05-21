<?php declare(strict_types=1);

// https://www.codewars.com/kata/5bed96b9a68c19d394000b1d/train/php

const PATTERN = '/[aeiouAEIOU]/';

function vowelRecognition(string $input): int
{
    $vowelCounter = 0;
    $strLength = mb_strlen($input);

    for ($i = 0; $i < $strLength; $i++) {
        if (1 === preg_match(PATTERN, $input[$i])) {
            $vowelCounter += ($strLength - $i) * ($i + 1);
        }
    }

    return $vowelCounter;
}
