<?php

namespace App\task131\entity;

use App\task131\entity\Person;

class ComputerProgrammer extends Person
{
    public function introduce(): string
    {
        return sprintf('Hello, my name is %s and I am a %s', $this->name, $this->occupation);
    }
}
