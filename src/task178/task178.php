<?php declare(strict_types=1);

// https://www.codewars.com/kata/6210fb7aabf047000f3a3ad6

const MISSING_CHAR = '*';
const UNKNOWN_CHAR = '#';

/**
 * @param string[] $phrase
 * @return string
 */
function assembleString(array $phrase): string
{
    $resultString = '';
    $phraseLength = strlen($phrase[0]);

    for ($i = 0; $i < $phraseLength; $i++) {
        $chars = getCharactersByIndex($i, $phrase);

        $uniqueChars = array_values(
            array_unique(
                $chars
            )
        );

        $resultString .= getMissingCharacter($uniqueChars);
    }

    return $resultString;
}

/**
 * @param int $index
 * @param string[] $strings
 * @return string[]
 */
function getCharactersByIndex(int $index, array $strings): array
{
    $letters = [];

    foreach ($strings as $str) {
        $letters[] = $str[$index];
    }

    return $letters;
}

/**
 * @param string[] $characters
 * @return string
 */
function getMissingCharacter(array $characters): string
{
    $nonMissing = array_filter($characters, static function (string $char): bool {
        return $char !== MISSING_CHAR;
    });

    if (1 === count($characters)) {
        return $nonMissing ? reset($nonMissing) : UNKNOWN_CHAR;
    }

    return implode('', $nonMissing);
}
