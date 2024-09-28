<?php

declare(strict_types=1);

namespace App\task053\GameValidator;

final class GameValidator
{
    public function isEqualDiceValues(int $die1, int $die2): bool
    {
        return $die1 === $die2;
    }
}