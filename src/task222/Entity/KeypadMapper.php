<?php declare(strict_types=1);

namespace App\task222\Entity;

final class KeypadMapper
{
    private array $KEYPAD_MAP = [
        '0' => ' ',
        '1' => '',
        '2' => ['a', 'b', 'c'],
        '3' => ['d', 'e', 'f'],
        '4' => ['g', 'h', 'i'],
        '5' => ['j', 'k', 'l'],
        '6' => ['m', 'n', 'o'],
        '7' => ['p', 'q', 'r', 's'],
        '8' => ['t', 'u', 'v'],
        '9' => ['w', 'x', 'y', 'z']
    ];

    public function getCharacter(Button $button): string
    {
        return
            '1' === $button->getKey() ?
                '' :
                $this->KEYPAD_MAP[$button->getKey()][$button->getPressed() - 1];
    }
}
