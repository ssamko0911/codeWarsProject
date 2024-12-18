<?php

declare(strict_types=1);

namespace App\task118\entity;

class President
{
    public string $name = 'Barack Obama';

    public function greet(string $name): string
    {
        return sprintf('Hello %s, my name is %s, nice to meet you!', $name, $this->name);
    }
}