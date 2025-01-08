<?php

declare(strict_types=1);

//https://www.codewars.com/kata/57b3bf0ad241568f2b0000b7

namespace App\task137\entity;

use InvalidArgumentException;

class Person
{
    protected string $name;
    protected int $age;
    protected string $occupation;

    public function __construct(string $name, int $age, string $occupation)
    {
        if (!is_string($name)) {
            throw new InvalidArgumentException('Name must be a string!');
        }

        if (!is_int($age) || 0 > $age) {
            throw new \InvalidArgumentException('Age must be a non-negative integer!');
        }

        if (!is_string($occupation)) {
            throw new \InvalidArgumentException('Occupation must be a string!');
        }

        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function get_name(): string
    {
        return $this->name;
    }

    public function get_age(): int
    {
        return $this->age;
    }

    public function get_occupation(): string
    {
        return $this->occupation;
    }

    public function set_name(string $name): void
    {
        if (!is_string($name)) {
            throw new InvalidArgumentException('Name must be a string!');
        } else {
            $this->name = $name;
        }
    }

    public function set_age(int $age): void
    {
        if (!is_int($age) || 0 > $age) {
            throw new InvalidArgumentException('Age must be a non-negative integer!');
        }

        $this->age = $age;
    }

    public function set_occupation(string $occupation): void
    {
        if (!is_string($occupation)) {
            throw new InvalidArgumentException('Occupation must be a string!');
        } else {
            $this->occupation = $occupation;
        }
    }
}
