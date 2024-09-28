<?php

declare(strict_types=1);

//https://www.codewars.com/kata/54e6533c92449cc251001667/train/php

/**
 * @param array<int, int|string>|string $iterable
 * @return array<int, int|string>|string
 */
function getUniqueOrder(array|string $iterable): array|string
{
    if ('' === $iterable || [] === $iterable) {
        return [];
    }

    $uniqueSequence = [
        getStartElement($iterable),
    ];

    $countElements = getElementsCount($iterable);

    addUniqueElements($countElements, $iterable, $uniqueSequence);

    return $uniqueSequence;
}

/**
 * @param array<int, int|string>|string $sequence
 * @return int|string
 */
function getStartElement(array|string $sequence): int|string
{
    return $sequence[0];
}

/**
 * @param array<int, int|string>|string $iterable
 * @return int
 */
function getElementsCount(array|string $iterable): int
{
    return gettype($iterable) === 'string' ? strlen($iterable) : count($iterable);
}

/**
 * @param int $limit
 * @param array<int, int|string>|string $iterable
 * @param array<int, int|string>|string $uniqueSequence
 * @return void
 */
function addUniqueElements(int $limit, array|string $iterable, array|string &$uniqueSequence): void
{
    for ($i = 1; $i < $limit; $i++) {
        if ($iterable[$i - 1] !== $iterable[$i]) {
            $uniqueSequence[] = $iterable[$i];
        }
    }
}
