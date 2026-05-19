<?php declare(strict_types=1);

namespace App\task247\Entity;

readonly class SingleDigitNumber extends Number
{
    public function __toString(): string
    {
        $digits = $this->getDigits();

        return sprintf(
            "%s",
            self::DIGIT_DICTIONARY[$digits[array_key_first($digits)]]
        );
    }
}