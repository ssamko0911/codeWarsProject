<?php declare(strict_types=1);

namespace App\task247\Entity;

readonly class DoubleDigitNumber extends SingleDigitNumber
{
    private const string TEEN_POSTFIX = 'teen';

    /** @var string[] */
    private const array EXCEPTIONS = [
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
    ];

    /** @var string[] */
    private const array TEENS = [
        13 => 'thir',
        14 => 'four',
        15 => 'fif',
        16 => 'six',
        17 => 'seven',
        18 => 'eigh',
        19 => 'nine',
    ];

    /** @var string[] */
    private const array TENS = [
        2 => 'twenty',
        3 => 'thirty',
        4 => 'forty',
        5 => 'fifty',
        6 => 'sixty',
        7 => 'seventy',
        8 => 'eighty',
        9 => 'ninety',
    ];

    #[\Override]
    public function __toString(): string
    {
        $numberAsString = '';

        if (array_key_exists($this->getNumber(), self::EXCEPTIONS)) {
            $numberAsString = self::EXCEPTIONS[$this->getNumber()];
        }

        if (array_key_exists($this->getNumber(), self::TEENS)) {
            $numberAsString = self::TEENS[$this->getNumber()] . self::TEEN_POSTFIX;
        }

        $digits = $this->getDigits();

        if (array_key_exists($digits[array_key_first($digits)], self::TENS)) {
            $numberAsString = self::TENS[$digits[array_key_first($digits)]] .
                ($digits[array_key_last($digits)] === 0 ? '' : '-' . (self::DIGIT_DICTIONARY[$digits[array_key_last($digits)]] ?? ''));
        }

        return sprintf(
            "%s",
            $numberAsString
        );
    }
}