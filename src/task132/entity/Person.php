<?php

namespace App\task132\entity;

use App\task132\impl\CanGreet;
use App\task132\impl\CanIntroduce;

class Person implements CanIntroduce, CanGreet
{
    public string $name;
    public int $age;
    public string $occupation;

    public function __construct(
        string $name,
        int    $age,
        string $occupation
    )
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function greet(string $name): string
    {
        return "Hello $name, how are you?";
    }


    public function speak(): string
    {
        return 'What am I supposed to say again?';
    }

    public function introduce(): string
    {
        return sprintf(
            'Hello, my name is %s, I am %d years old and I am currently working as a(n) %s',
            $this->name, $this->age, $this->occupation
        );
    }
}
