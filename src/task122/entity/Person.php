<?php

declare(strict_types=1);

//https://www.codewars.com/kata/579a09787cb7a14d0b000057/train/php

namespace App\task122\entity;

class Person
{
    const SPECIES = 'Homo Sapiens';

    public string $name;
    public int $age;
    public string $occupation;

    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function introduce(): string
    {
        return sprintf('Hello, my name is %s', $this->name);
    }

    public function describe_job(): string
    {
        return sprintf('I am currently working as a(n) %s', $this->occupation);
    }

    public static function greet_extraterrestrials(string $species): string
    {
        return sprintf('Welcome to Planet Earth %s!', $species);
    }
}