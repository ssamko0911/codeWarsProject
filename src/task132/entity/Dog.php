<?php

namespace App\task132\entity;

use App\task132\impl\CanGreet;
use App\task132\impl\CanSwim;

class Dog implements CanSwim, CanGreet
{
    public function swim(): string
    {
        return "I'm swimming, woof woof";
    }

    public function greet(string $name): string
    {
        return "Hello $name, welcome to my home";
    }

    public function bark(): string
    {
        return 'Woof woof';
    }
}
