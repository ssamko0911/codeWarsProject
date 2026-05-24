<?php declare(strict_types=1);

// https://www.codewars.com/kata/57fafb6d2b5314c839000195/train/php

function remove(string $str): string
{
    return implode(
        ' ',
        array_filter(
            explode(' ', $str),
            static function (string $word): bool {
                return substr_count($word, '!') !== 1;
            }
        )
    );
}
