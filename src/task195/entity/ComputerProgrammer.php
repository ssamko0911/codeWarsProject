<?php declare(strict_types=1);

namespace App\task195\entity;

use App\task195\entity\Person;

class ComputerProgrammer extends Person
{
    public string $occupation = 'Computer Programmer';

    public function __construct($name, $age, $gender)
    {
        parent::__construct($name, $age, $gender);
    }

    public function introduce(): string
    {
        return sprintf(
            'Hello, my name is %s, I am %s years old and I am a(n) %s',
            $this->name,
            $this->age,
            $this->occupation
        );
    }

    public function greet($name): string
    {
        return sprintf('Hello %s, I\'m %s, nice to meet you', $name, $this->name);
    }

    public function advertise(): string
    {
        return 'Don\'t forget to check out my coding projects';
    }
}
