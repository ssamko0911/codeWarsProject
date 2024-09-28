<?php

declare(strict_types=1);

// https://www.codewars.com/kata/58f5c63f1e26ecda7e000029/train/php

function wave(string $people): array
{
    if (empty($people)) {
        return [];
    }

    $initialString = $people;

    $result = [];

    for ($i = 0; $i < strlen($people); $i++) {
        if ($initialString[$i] === ' ') {
            continue;
        }

        $initialString[$i] = strtoupper($people[$i]);
        $result[] = $initialString;
        $initialString = $people;
    }

    return $result;
}
