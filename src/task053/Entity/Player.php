<?php

declare(strict_types=1);

namespace App\task053\Entity;

class Player
{
    private int $position = 0;

    public function __construct(
        private int $playerId
    ) {
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function makeMove($diceValues): int
    {
        echo $this->getPlayerId() . PHP_EOL;
        print_r($diceValues);

        return $this->getPosition() + ($diceValues['diceOne'] + $diceValues['diceTwo']);
    }

    public function getPositionAsString(int $possiblePosition, Player $player): string
    {
        return sprintf('Player %d is on square %d', $player->playerId, $possiblePosition);
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }
}
