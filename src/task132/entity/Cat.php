<?php

namespace App\task132\entity;

use App\task132\impl\CanClimb;

class Cat implements CanClimb
{
    public function meow(): string
    {
        return 'Meow meow';
    }

    public function climb(): string
    {
        return "Look, I'm climbing a tree";
    }

    public function play(string $name): string
    {
        return "Hey $name, let's play!";
    }
}
