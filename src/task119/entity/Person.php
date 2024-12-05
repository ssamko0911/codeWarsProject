<?php

declare(strict_types=1);

namespace App\task119\entity;

class Person
{
    public string $first_name;
    public string $last_name;

    public function __construct(string $first_name, string $last_name)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function get_full_name(): string
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }
}