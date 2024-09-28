<?php

declare(strict_types=1);

//https://www.codewars.com/kata/583203e6eb35d7980400002a/train/php

// "/[:;][-~]?[\)D]/" preg_match pattern is an alternative solution;

const VALID_EYES = [
    ':',
    ';',
];

const VALID_NOSE = [
    '-',
    '~',
];

const VALID_MOUTH = [
    ')',
    'D',
];

const SHORT_SMILE = 2;

/**
 * @param string[] $smileys
 * @return int
 */
function countSmileyFaces(array $smileys): int
{
    $count = 0;

    if ([] === $smileys) {
        return $count;
    }

    foreach ($smileys as $smiley) {
        if (isValidSmile($smiley, strlen($smiley))) {
            $count++;
        }
    }

    return $count;
}

function isValidEyes(string $eyesCharacter): bool
{
    return in_array($eyesCharacter, VALID_EYES);
}

function isValidNose(string $noseCharacter): bool
{
    return in_array($noseCharacter, VALID_NOSE);
}

function isValidMouth(string $mouthCharacter): bool
{
    return in_array($mouthCharacter, VALID_MOUTH);
}

function isValidSmile(string $smile, int $smileLength): bool
{
    if ($smileLength === SHORT_SMILE) {
        return isValidEyes($smile[0]) && isValidMouth($smile[1]);
    }

    return isValidEyes($smile[0]) && isValidNose($smile[1]) && isValidMouth($smile[2]);
}
