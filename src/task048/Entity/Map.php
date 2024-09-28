<?php

declare(strict_types=1);

namespace App\task048\Entity;

final readonly class Map
{
    public function __construct(
        private array $maze,
        private array $route
    )
    {
    }

    public function getMaze(): array
    {
        return $this->maze;
    }

    public function getRoute(): array
    {
        return $this->route;
    }
}
