<?php

declare(strict_types=1);

//https://www.codewars.com/kata/57814d79a56c88e3e0000786/train/php

function encrypt(?string $text, int $repeat): string|null
{
    if ($repeat === 0 || $repeat < 0) {
        return $text;
    }

    $encrypted = getEncryptedText($text);

    for ($i = 1; $i < $repeat; $i++) {
        $encrypted = getEncryptedText($encrypted);
    }

    return $encrypted;
}

function getEncryptedText(string $text): string
{
    $textAsArray = str_split($text);

    $charsByEvenIndex = getCharacters($textAsArray, true);
    $charsByOddIndex = getCharacters($textAsArray);

    return implode('', $charsByOddIndex) . implode('', $charsByEvenIndex);
}

/**
 * @param string[] $arr
 * @param bool $isEven
 * @return string[]
 */
function getCharacters(array $arr, bool $isEven = false): array
{
    return array_filter($arr, function ($key) use ($isEven) {
        return $isEven ? $key % 2 === 0 : $key % 2 !== 0;
    }, ARRAY_FILTER_USE_KEY);
}

function decrypt(?string $text, int $repeat): string|null
{
    if ($repeat === 0 || $repeat < 0) {
        return $text;
    }

    $decrypted = getDecryptedText($text);

    for ($i = 1; $i < $repeat; $i++) {
        $decrypted = getDecryptedText($decrypted);
    }

    return $decrypted;
}

function getDecryptedText(string $text): string
{
    $evenIndexKeys = getArrayKeys($text, true);
    $oddIndexKeys = getArrayKeys($text);

    $evenIndexValues = getValuesAsString($text, true);
    $oddIndexValues = getValuesAsString($text);

    $evenDecryptedChars = decryptCharacters($evenIndexKeys, $evenIndexValues);
    $oddDecryptedChars = decryptCharacters($oddIndexKeys, $oddIndexValues);

    $decoded = [];
    $decodedLength = count($evenDecryptedChars) + count($oddDecryptedChars);

    getDecryptedCharactersAsArray($decodedLength, $decoded, $evenDecryptedChars, $oddDecryptedChars);

    return implode('', $decoded);
}

/**
 * @param string $text
 * @param bool $isEven
 * @return int[]
 */
function getArrayKeys(string $text, bool $isEven = false): array
{
    return range($isEven ? 0 : 1, strlen($text), 2);
}


function getValuesAsString(string $text, bool $isEven = false): string
{
    if ($isEven) {
        return substr($text, (int)(strlen($text) / 2));
    }

    return substr($text, 0, (int)(strlen($text) / 2));
}

/**
 * @param int[] $keys
 * @param string $values
 * @return array
 */
function decryptCharacters(array $keys, string $values): array
{
    $decryptedCharacters = [];

    for ($i = 0; $i < strlen($values); $i++) {
        $decryptedCharacters[$keys[$i]] = $values[$i];
    }

    return $decryptedCharacters;
}


/**
 * @param int $length
 * @param string[] $decodedStringAsArray
 * @param array<int, string> $evenIndexDecryptedCharacters
 * @param array<int, string> $oddIndexDecryptedCharacters
 * @return void
 */
function getDecryptedCharactersAsArray(
    int   $length,
    array &$decodedStringAsArray,
    array $evenIndexDecryptedCharacters,
    array $oddIndexDecryptedCharacters): void
{
    for ($i = 0; $i < $length; $i++) {
        if ($i % 2 === 0) {
            $decodedStringAsArray[$i] = $evenIndexDecryptedCharacters[$i];
        } else {
            $decodedStringAsArray[$i] = $oddIndexDecryptedCharacters[$i];
        }
    }
}
