<?php

namespace App\task132\entity;

use App\task132\impl\CanFly;

class Bird implements CanFly
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function fly(): string
    {
        return 'I am flying';
    }

    public function chirp(): string
    {
        return 'Chirp chirp';
    }
}
