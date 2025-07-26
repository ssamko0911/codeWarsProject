<?php declare(strict_types=1);

//https://www.codewars.com/kata/58bee820e9f98b215200007c/train/php

const BAD_MEMORY_MARK = '!';

function select(string $memory): string
{
    $people = explode(', ', $memory);
    $targets = getAllTargets($people);

    removeExclamationMarks($targets);
    removeExclamationMarks($people);

    $uniqueTargets = array_values(array_unique($targets));

    if (0 === count($targets)) {
        return $memory;
    }

    $cleaned = array_values(
        array_filter($people, static function (string $person) use ($uniqueTargets): bool {
            return !in_array($person, $uniqueTargets);
        })
    );

    return trim(implode(', ', $cleaned));
}

/**
 * @param string[] $people
 * @return string[]
 */
function getAllTargets(array $people): array
{
    $targets = [];
    $length = count($people);

    for ($i = 0; $i < $length; $i++) {
        if (BAD_MEMORY_MARK === $people[$i][0]) {
            $targets[] = $people[$i];
            if ($length - 1 !== $i) {
                $targets[] = $people[$i + 1];
            }
        }
    }

    return $targets;
}

/**
 * @param string[] $data
 * @return void
 */
function removeExclamationMarks(array &$data): void
{
    array_walk($data, static function (string &$person): void {
        $person = trim($person, '!');
    });
}
