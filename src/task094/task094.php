<?php

declare(strict_types=1);

//https://www.codewars.com/kata/541c8630095125aba6000c00/train/php

function getDigitalRoot(int $number): int
{
    while (1 !== strlen(strval($number))) {
        $number = array_sum(
            str_split(
                strval($number)
            )
        );
        getDigitalRoot($number);
    }

    return $number;
}
