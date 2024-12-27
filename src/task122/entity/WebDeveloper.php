<?php

namespace App\task122\entity;

class WebDeveloper extends ComputerProgrammer
{
    public string $occupation = 'Web Developer';

    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age);
    }

    public function describe_job(): string
    {
        return sprintf("%s And don't forget to check on my website :D", parent::describe_job());
    }

    public function describe_website(): string
    {
        return 'My professional world-class website is made from HTML, CSS, Javascript and PHP!';
    }
}
