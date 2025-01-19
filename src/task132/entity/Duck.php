<?php

namespace App\task132\entity;

use App\task132\impl\CanSwim;

class Duck extends Bird implements CanSwim
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function chirp(): string
    {
        return 'Quack quack';
    }


    public function swim(): string
    {
        return "Splash! I'm swimming";
    }
}
