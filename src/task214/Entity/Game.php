<?php declare(strict_types=1);

namespace App\task214\Entity;

final readonly class Game
{
    public function __construct(
        private Player $playerOne,
        private Player $playerTwo,
    )
    {
    }

    public function getWinner(): ?Player
    {
        if ($this->playerOne->getCharacter() === $this->playerTwo->getCharacter()) {
            return null;
        }

        if (!in_array($this->playerOne->getCharacter(), $this->playerTwo->getPowers())) {
            return $this->playerOne;
        }

        return $this->playerTwo;
    }
}
