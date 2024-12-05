<?php

namespace App\task120\entity;

class CurrentUSPresident
{
    const PRESIDENT_NAME = 'Barack Obama';

    public static function greet(string $name): string
    {
        return sprintf('Hello %s, my name is %s, nice to meet you!', $name, CurrentUSPresident::PRESIDENT_NAME);
    }
}