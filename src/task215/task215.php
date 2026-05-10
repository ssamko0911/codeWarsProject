<?php declare(strict_types=1);

//https://www.codewars.com/kata/57f22b0f1b5432ff09001cab/train/php

const GOOD_KEY = 'good';
const RETURN_LABELS = [
    'fail' => 'Fail!',
    'publish' => 'Publish!',
    'series' => 'I smell a series!',
];

/**
 * @param array<int, string[]> $array
 * @return string
 * @throws Exception
 */
function well(array $array): string
{
    $goodIdeas = [];

    array_walk_recursive(
        $array,
        static function ($item) use (&$goodIdeas): void {
            if (strtolower($item) === GOOD_KEY) {
                $goodIdeas[] = $item;
            }
        });

    $ideaCount = count($goodIdeas);

    return match (true) {
        0 === $ideaCount => RETURN_LABELS['fail'],
        2 >= $ideaCount => RETURN_LABELS['publish'],
        2 < $ideaCount => RETURN_LABELS['series'],
        default => throw new \Exception('Unexpected value')
    };
}
