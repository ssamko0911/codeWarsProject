<?php

declare(strict_types=1);

//https://www.codewars.com/kata/609eee71109f860006c377d1/train/php

function lastSurvivor(string $letters, array $coords): string
{
    for ($i = 0; $i < count($coords); $i++) {
        $letters = substr_replace($letters, '', $coords[$i], 1);
    }

    return trim($letters);
}
