<?php

namespace App\task122\entity;

use App\task122\entity\Person;

class Salesman extends Person
{
    public string $occupation = 'Salesman';

    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age, $this->occupation);
    }

    public function introduce(): string
    {
        return sprintf("%s, don't forget to check out my products!", parent::introduce());
    }
}
