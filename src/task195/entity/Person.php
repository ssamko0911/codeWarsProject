<?php declare(strict_types=1);

namespace App\task195\entity;

abstract class Person
{
    public function __construct(
        public string $name,
        public int $age,
        public string $gender
    ) {
    }

    public abstract function introduce(): string;

    public function greet(string $name): string
    {
        return sprintf('Hello %s', $name);
    }
}
