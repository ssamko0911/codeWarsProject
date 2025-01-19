<?php

namespace App\task122\entity;

class ComputerProgrammer extends Person
{
    public string $occupation = 'Computer Programmer';

    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age, $this->occupation);
    }

    public function describe_job(): string
    {
        return sprintf("%s, don't forget to check out my Codewars account ;)", parent::describe_job());
    }
}
