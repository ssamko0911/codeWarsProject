<?php declare(strict_types=1);

// https://www.codewars.com/kata/52724507b149fa120600031d/train/php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\task247\Entity\DoubleDigitNumber;
use App\task247\Entity\FiveDigitNumber;
use App\task247\Entity\FourDigitNumber;
use App\task247\Entity\SingleDigitNumber;
use App\task247\Entity\SixDigitNumber;
use App\task247\Entity\TripleDigitNumber;

function number2words(int $number): string
{
    $length = strlen((string) $number);

    return match (true) {
        $length === 1 => (string) new SingleDigitNumber($number),
        $length === 2 => (string) new DoubleDigitNumber($number),
        $length === 3 => (string) new TripleDigitNumber($number),
        $length === 4 => (string) new FourDigitNumber($number),
        $length === 5 => (string) new FiveDigitNumber($number),
        $length === 6 => (string) new SixDigitNumber($number),
        default => '',
    };
}

echo number2words(793) . PHP_EOL;
echo number2words(1000) . PHP_EOL;
echo number2words(1003) . PHP_EOL;
echo number2words(7219) . PHP_EOL;
echo number2words(99999) . PHP_EOL;
echo number2words(888888) . PHP_EOL;

// SUBMITTED ++
//abstract class Number
//{
//    /** @var int[] $digits */
//    private array $digits;
//    /** @var string[] */
//    public const DIGIT_DICTIONARY = [
//        0 => 'zero',
//        1 => 'one',
//        2 => 'two',
//        3 => 'three',
//        4 => 'four',
//        5 => 'five',
//        6 => 'six',
//        7 => 'seven',
//        8 => 'eight',
//        9 => 'nine',
//    ];
//
//    public function __construct(
//        private int $number
//    ) {
//        $this->digits = array_map('intval', str_split((string)$number));
//    }
//
//    public function getNumber(): int
//    {
//        return $this->number;
//    }
//
//    /**
//     * @return int[]
//     */
//    public function getDigits(): array
//    {
//        return $this->digits;
//    }
//}
//
//class SingleDigitNumber extends Number
//{
//    public function __toString(): string
//    {
//        $digits = $this->getDigits();
//
//        return sprintf(
//            "%s",
//            self::DIGIT_DICTIONARY[$digits[array_key_first($digits)]]
//        );
//    }
//}
//
//class DoubleDigitNumber extends SingleDigitNumber
//{
//    private const TEEN_POSTFIX = 'teen';
//
//    /** @var string[] */
//    private const EXCEPTIONS = [
//        10 => 'ten',
//        11 => 'eleven',
//        12 => 'twelve',
//    ];
//
//    /** @var string[] */
//    private const TEENS = [
//        13 => 'thir',
//        14 => 'four',
//        15 => 'fif',
//        16 => 'six',
//        17 => 'seven',
//        18 => 'eigh',
//        19 => 'nine',
//    ];
//
//    /** @var string[] */
//    private const TENS = [
//        2 => 'twenty',
//        3 => 'thirty',
//        4 => 'forty',
//        5 => 'fifty',
//        6 => 'sixty',
//        7 => 'seventy',
//        8 => 'eighty',
//        9 => 'ninety',
//    ];
//
//    #[\Override]
//    public function __toString(): string
//    {
//        $numberAsString = '';
//
//        if (array_key_exists($this->getNumber(), self::EXCEPTIONS)) {
//            $numberAsString = self::EXCEPTIONS[$this->getNumber()];
//        }
//
//        if (array_key_exists($this->getNumber(), self::TEENS)) {
//            $numberAsString = self::TEENS[$this->getNumber()] . self::TEEN_POSTFIX;
//        }
//
//        $digits = $this->getDigits();
//
//        if (array_key_exists($digits[array_key_first($digits)], self::TENS)) {
//            $numberAsString = self::TENS[$digits[array_key_first($digits)]] .
//                ($digits[array_key_last($digits)] === 0 ? '' : '-' . (self::DIGIT_DICTIONARY[$digits[array_key_last($digits)]] ?? ''));
//        }
//
//        return sprintf(
//            "%s",
//            $numberAsString
//        );
//    }
//}
//class TripleDigitNumber extends DoubleDigitNumber
//{
//    private const HUNDRED_LABEL = 'hundred';
//
//    #[\Override]
//    public function __toString(): string
//    {
//        $numberAsString = '';
//        $digits = $this->getDigits();
//
//        $numberAsString .= self::DIGIT_DICTIONARY[$digits[array_key_first($digits)]];
//        $numberAsString .= ' ' . self::HUNDRED_LABEL;
//
//        if ($this->getNumber() % 100 >= 10) {
//            $numberAsString .= ' ' . new DoubleDigitNumber($this->getNumber() % 100);
//        } else {
//            if ($this->getNumber() % 100 !== 0) {
//                $numberAsString .= ' ' . new SingleDigitNumber($this->getNumber() % 100);
//            }
//        }
//
//        return sprintf(
//            "%s",
//            $numberAsString
//        );
//    }
//}
//
//class FourDigitNumber extends TripleDigitNumber
//{
//    private const THOUSAND_LABEL = 'thousand';
//
//    #[\Override]
//    public function __toString(): string
//    {
//        $numberAsString = '';
//        $digits = $this->getDigits();
//
//        $numberAsString .= self::DIGIT_DICTIONARY[$digits[array_key_first($digits)]];
//        $numberAsString .= ' '.self::THOUSAND_LABEL;
//
//        if ($this->getNumber() % 1000 >= 100) {
//            $numberAsString .= ' '.new TripleDigitNumber($this->getNumber() % 1000);
//        } elseif ($this->getNumber() % 100 >= 10) {
//            $numberAsString .= ' '.new DoubleDigitNumber($this->getNumber() % 100);
//        } else {
//            if ($this->getNumber() % 100 !== 0) {
//                $numberAsString .= ' '.new SingleDigitNumber($this->getNumber() % 100);
//            }
//        }
//
//        return sprintf(
//            "%s",
//            $numberAsString
//        );
//    }
//}
//
//class FiveDigitNumber extends FourDigitNumber
//{
//    private const THOUSAND_LABEL = 'thousand';
//
//    #[\Override]
//    public function __toString(): string
//    {
//        $numberAsString = '';
//        $digits = $this->getDigits();
//        $thousands = (int) implode([$digits[0], $digits[1]]);
//
//        $numberAsString .= new DoubleDigitNumber($thousands);
//        $numberAsString .= ' '.self::THOUSAND_LABEL;
//
//        if ($this->getNumber() % 1000 >= 100) {
//            $numberAsString .= ' '.new TripleDigitNumber($this->getNumber() % 1000);
//        } elseif ($this->getNumber() % 100 >= 10) {
//            $numberAsString .= ' '.new DoubleDigitNumber($this->getNumber() % 100);
//        } else {
//            if ($this->getNumber() % 100 !== 0) {
//                $numberAsString .= ' '.new SingleDigitNumber($this->getNumber() % 100);
//            }
//        }
//
//        return sprintf(
//            "%s",
//            $numberAsString
//        );
//    }
//}
//
//class SixDigitNumber extends FourDigitNumber
//{
//    private const THOUSAND_LABEL = 'thousand';
//
//    #[\Override]
//    public function __toString(): string
//    {
//        $numberAsString = '';
//        $digits = $this->getDigits();
//        $thousands = (int) implode([$digits[0], $digits[1], $digits[2]]);
//
//        $numberAsString .= new TripleDigitNumber($thousands);
//        $numberAsString .= ' '.self::THOUSAND_LABEL;
//
//        if ($this->getNumber() % 1000 >= 100) {
//            $numberAsString .= ' '.new TripleDigitNumber($this->getNumber() % 1000);
//        } elseif ($this->getNumber() % 100 >= 10) {
//            $numberAsString .= ' '.new DoubleDigitNumber($this->getNumber() % 100);
//        } else {
//            if ($this->getNumber() % 100 !== 0) {
//                $numberAsString .= ' '.new SingleDigitNumber($this->getNumber() % 100);
//            }
//        }
//
//        return sprintf(
//            "%s",
//            $numberAsString
//        );
//    }
//}
//
//function number2words(int $number): string
//{
//    $length = strlen((string) $number);
//
//    return match (true) {
//        $length === 1 => (string) new SingleDigitNumber($number),
//        $length === 2 => (string) new DoubleDigitNumber($number),
//        $length === 3 => (string) new TripleDigitNumber($number),
//        $length === 4 => (string) new FourDigitNumber($number),
//        $length === 5 => (string) new FiveDigitNumber($number),
//        $length === 6 => (string) new SixDigitNumber($number),
//        default => '',
//    };
//}
