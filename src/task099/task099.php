<?php

declare(strict_types=1);

//https://www.codewars.com/kata/587731fda577b3d1b0001196/train/php

function setCamelCase(string $str): string
{
    return implode('', array_map(
            function ($word) {
                return ucfirst($word);
            }, explode(' ', $str)
        )
    );
}
