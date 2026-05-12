<?php declare(strict_types=1);

namespace App\task222\Entity;

final readonly class Button
{
    public function __construct(
        private string $key,
        private int    $pressed
    )
    {
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getPressed(): int
    {
        return $this->pressed;
    }
}
