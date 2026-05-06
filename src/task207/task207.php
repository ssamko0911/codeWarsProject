<?php declare(strict_types=1);

//https://www.codewars.com/kata/5d2d0d34bceae80027bffddb

const VOWELS = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];

/**
 * @param $strings
 * @return string[]
 */
function sortStringsByVowels($strings): array
{
    $counts = [];

    foreach ($strings as $string) {
        $countContiguousVowels = 0;
        $counts[$string] = 0;
        $length = strlen($string);

        for ($i = 0; $i < $length; $i++) {
            if (in_array($string[$i], VOWELS, true)) {
                $countContiguousVowels++;
            } else {
                updateVowelCount($counts[$string], $countContiguousVowels);
                $countContiguousVowels = 0;
            }

            updateVowelCount($counts[$string], $countContiguousVowels);
        }
    }

    arsort($counts);

    return array_values(array_keys($counts));
}

function updateVowelCount(int &$count, int $countContiguousVowels): void
{
    if ($countContiguousVowels > $count) {
        $count = $countContiguousVowels;
    }
}
