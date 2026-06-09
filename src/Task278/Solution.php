<?php declare(strict_types=1);

// https://www.codewars.com/kata/5f3142b3a28d9b002ef58f5e/train/php

namespace App\Task278;

final class Solution
{
    public static function wordPattern(string $word): string
    {
        $codedWord = '';

        $letterContainer = [];
        $length = mb_strlen($word);
        $lowerCaseWord = mb_strtolower($word);

        for ($i = 0; $i < $length; $i++) {
            if (!in_array($lowerCaseWord[$i], $letterContainer, true)) {
                $letterContainer[] = $lowerCaseWord[$i];
            }

            $codedIndex = array_search($lowerCaseWord[$i], $letterContainer, true);

            if (false !== $codedIndex) {
                $codedWord .= sprintf('%s%s', $codedIndex, ($i === $length - 1) ? '' : '.');
            }
        }

        return $codedWord;
    }
}

/**
 * To analyze:
 *
 * function wordPattern($word) {
 *      $word = str_split(strtolower($word));
 *      $letters = array_values(array_unique($word));
 *
 *      return str_replace($letters, array_keys($letters), join('.', $word));
 * }
 *
 */