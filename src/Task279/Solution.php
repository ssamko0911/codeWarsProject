<?php declare(strict_types=1);

// https://www.codewars.com/kata/60a1aac7d5a5fc0046c89651/train/php

namespace App\Task279;

final class Solution
{
    public final const int FIRST_LETTER_CODE = 97;
    public final const int LAST_LETTER_CODE = 122;

    public static function lastSurvivors(string $str): string
    {
        if ('' === trim($str)) {
            return $str;
        }

        $letters = str_split($str);
        sort($letters, SORT_STRING);
        $noPairs = count(array_unique($letters)) === count($letters);

        if ($noPairs) {
            return $str;
        }

        return self::lastSurvivors(self::getUpdatedString($letters));
    }

    /**
     * @param string[] $letters
     */
    private static function getUpdatedString(array $letters): string
    {
        $updatedLetters = '';
        $sliceIndex = 0;
        $lettersLength = count($letters);

        for ($i = 1; $i < $lettersLength; $i++) {
            if ($letters[$i] === $letters[$i - 1]) {
                $updatedLetters .= self::getUpdatedLetter($letters[$i]);
                $sliceIndex = $i + 1;
                break;
            }

            $updatedLetters .= $letters[$i - 1];
        }

        return $updatedLetters.implode('', array_slice($letters, $sliceIndex));
    }

    private static function getUpdatedLetter(string $letter): string
    {
        return chr(
            self::LAST_LETTER_CODE === ord($letter) ?
                self::FIRST_LETTER_CODE :
                ord($letter) + 1
        );
    }
}
