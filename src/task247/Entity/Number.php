<?php declare(strict_types=1);

namespace App\task247\Entity;

abstract readonly class Number
{
    /** @var int[] $digits */
    private array $digits;
    /** @var string[] */
    public const array DIGIT_DICTIONARY = [
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
    ];

    public function __construct(
        private int $number
    ) {
        $this->digits = array_map('intval', str_split((string)$number));
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return int[]
     */
    public function getDigits(): array
    {
        return $this->digits;
    }
}