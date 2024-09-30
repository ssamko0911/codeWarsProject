<?php

declare(strict_types=1);

//https://www.codewars.com/kata/51e0007c1f9378fa810002a9/train/php

const PARSE_CASES = [
  'increment' => 'i',
  'decrement' => 'd',
  'square' => 's',
];

const OUTPUT = 'o';

/**
 * @param string $data
 * @return int[]
 */
function parse(string $data): array
{
    $parsed = 0;

    $output = [];

    for ($i = 0; $i < strlen($data); $i++) {
        if (in_array($data[$i], PARSE_CASES)) {
            $parsed = updateInitialValue($data[$i], $parsed);
        }

        if (OUTPUT === $data[$i]) {
            $output[] = $parsed;
        }
    }

    return $output;
}

function updateInitialValue(string $char, int $value): int
{
    if ($char === PARSE_CASES['increment']) {
        return $value + 1;
    }

    if ($char === PARSE_CASES['decrement']) {
        return $value - 1;
    }

    if ($char === PARSE_CASES['square']) {
        return $value * $value;
    }

    return 0;
}
