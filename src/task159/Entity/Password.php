<?php

declare(strict_types=1);

namespace App\task159\Entity;

class Password
{
    private string $password = '';
    private Position $position;

    public function __construct(
        private readonly Grid $grid,
    )
    {
        $this->position = $this->grid->getStartingPosition();
    }

    private function fetchChar(): string
    {
        return $this->grid->getCell($this->position->x, $this->position->y);
    }

    /**
     * @param string[] $directions
     * @return string
     */
    public function getPassword(array $directions): string
    {
        foreach ($directions as $direction) {
            if ('T' === $direction[strlen($direction) - 1]) {
                $direction = 'lefT' === $direction ? strtolower($direction) : strtolower(substr($direction, 0, -1));
                $this->position->move($direction);
                $this->password .= $this->fetchChar();
            } else {
                $this->position->move($direction);
            }
        }

        return $this->password;
    }
}
