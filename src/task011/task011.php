<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5878520d52628a092f0002d0/train/php

function transform(string $string): string
{
    $newWords = [];

    $words = explode(' ', $string);

    foreach ($words as $word) {
        for ($i = 0; $i < strlen($word); $i++) {
            $word[$i] = ctype_upper($word[$i]) ? strtolower($word[$i]) : strtoupper($word[$i]);
        }
        $newWords[] = $word;
    }

    return implode(' ', array_reverse($newWords));
}
