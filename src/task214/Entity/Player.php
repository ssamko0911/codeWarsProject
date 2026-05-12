<?php declare(strict_types=1);

namespace App\task214\Entity;

use App\task214\Enums\Character;

final readonly class Player
{
    public function __construct(
        private Character $character,
        private int       $id
    )
    {
    }

    public function getCharacter(): Character
    {
        return $this->character;
    }

    public function getId(): int
    {
        return $this->id;
    }

    /** @return Character[] */
    public function getPowers(): array
    {
        return $this->character->getPowers();
    }
}
