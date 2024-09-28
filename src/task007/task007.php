<?php

declare(strict_types=1);

//https://www.codewars.com/kata/597bb84522bc93b71e00007e/train/php

function stringMerge($string1, $string2, $letter): string
{
    $firstString = substr($string1, 0, strpos($string1, $letter));
    $secondString = substr($string2, strpos($string2, $letter));

    return $firstString.$secondString;
}
