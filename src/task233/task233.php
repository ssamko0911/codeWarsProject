<?php declare(strict_types=1);

// https://www.codewars.com/kata/585a033e3a36cdc50a00011c/train/php

function freq_seq(string $str, string $separator): string {
    $charCountArray = array_count_values(
        mb_str_split($str)
    );

    $translatedStr = '';

    $length = mb_strlen($str);

    for ($i = 0; $i < $length; $i++) {
       $translatedStr .= ($i === $length - 1) ?
           $charCountArray[$str[$i]] :
           $charCountArray[$str[$i]] . $separator;
    }

    return $translatedStr;
}
