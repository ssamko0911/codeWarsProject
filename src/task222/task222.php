<?php declare(strict_types=1);

//https://www.codewars.com/kata/635b8fa500fba2bef9189473/train/php

use App\task222\Entity\Button;
use App\task222\Entity\KeypadMapper;
use App\task222\Entity\Phone;

require_once __DIR__ . "/../../vendor/autoload.php";

const CHARS_ON_BUTTON_DEFAULT = 3;
const CHARS_ON_BUTTON_EXTENDED = 4;
const EXTENDED_BUTTON_CHARS = [
    '7', '9'
];

function phoneWords(string $str): string
{
    if ('' === $str) {
        return '';
    }

    $charCodes = getCharacterCodes(str_split($str));
    $buttons = [];

    foreach ($charCodes as $charCode) {
        $charCodeAsString = implode('', $charCode);

        $buttons[] = new Button(
            mb_substr($charCodeAsString, 0, 1),
            mb_strlen($charCodeAsString)
        );
    }

    $phone = new Phone(
        new KeypadMapper(),
        $buttons
    );

    return $phone->getTextMessage();
}

/**
 * @param string[] $charDigits
 * @return array<int, string[]>
 */
function getCharacterCodes(array $charDigits): array
{
    $charCodes = [];
    $buffer = [];

    foreach ($charDigits as $char) {
        if ('0' === $char) {
            flushBuffer($charCodes, $buffer);
            $charCodes[] = [$char];
            continue;
        }

        if (getBufferSize($char) === count($buffer)) {
            flushBuffer($charCodes, $buffer);
        }

        if (!in_array($char, $buffer, true)) {
            flushBuffer($charCodes, $buffer);
        }

        $buffer[] = $char;
    }

    if ([] !== $buffer) {
        $charCodes[] = $buffer;
    }

    return $charCodes;
}

function getBufferSize(string $char): int
{
    return
        in_array($char, EXTENDED_BUTTON_CHARS, true) ?
            CHARS_ON_BUTTON_EXTENDED :
            CHARS_ON_BUTTON_DEFAULT;
}

/**
 * @param array<int, string[]> $collection
 * @param string[] $buffer
 */
function flushBuffer(array &$collection, array &$buffer): void
{
    if ([] !== $buffer) {
        $collection[] = $buffer;
        $buffer = [];
    }
}
