<?php

declare(strict_types=1);

//https://www.codewars.com/kata/64ad571aa33413003e712168/train/php
// return bindec(strrev(implode(array_map(fn($d)=>$d=='Y'?1:0,array_filter(str_split($a),fn($c)=>$c=='Y'||$c=='N')))));
const STRING_NEEDLE_YES = 'Yes';
const STRING_NEEDLE_NO = 'No';

function magicShow(string $cardInfo): int
{
    $cardInfoAsArray = explode(' ', $cardInfo);
    $words = getBinaryWords($cardInfoAsArray);

    return bindec(getBinaryNumberAsString($words));
}

/**
 * @param string[] $words
 * @return array<int, string>
 */
function getBinaryWords(array $words): array
{
    return array_filter($words, function ($word) {
        return STRING_NEEDLE_YES === $word || STRING_NEEDLE_NO === $word;
    });
}

/**
 * @param array<int, string> $words
 * @return string
 */
function getBinaryNumberAsString(array $words): string
{
    return strrev(
        implode('',
            array_map(function ($word) {
                return STRING_NEEDLE_YES === $word ? 1 : 0;
            }, $words)
        )
    );
}
