<?php declare(strict_types=1);

namespace App\task247\Entity;

readonly class TripleDigitNumber extends DoubleDigitNumber
{
    private const string HUNDRED_LABEL = 'hundred';

    #[\Override]
    public function __toString(): string
    {
        $numberAsString = '';
        $digits = $this->getDigits();

        $numberAsString .= self::DIGIT_DICTIONARY[$digits[array_key_first($digits)]];
        $numberAsString .= ' ' . self::HUNDRED_LABEL;

        if ($this->getNumber() % 100 >= 10) {
            $numberAsString .= ' ' . new DoubleDigitNumber($this->getNumber() % 100);
        } else {
            if ($this->getNumber() % 100 !== 0) {
                $numberAsString .= ' ' . new SingleDigitNumber($this->getNumber() % 100);
            }
        }

        return sprintf(
            "%s",
            $numberAsString
        );
    }
}