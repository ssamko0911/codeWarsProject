<?php declare(strict_types=1);

namespace App\task195\entity;

use App\task195\entity\Person;

final class Child extends Person
{
    /** @var string[] $aspirations */
    public array $aspirations;

    public function __construct($name, $age, $gender, $aspirations)
    {
        parent::__construct($name, $age, $gender);
        $this->aspirations = $aspirations;
    }

    public function introduce(): string
    {
        return sprintf('Hi, I\'m %s and I am %s years old', $this->name, $this->age);
    }

    public function greet(string $name): string
    {
        return sprintf('Hi %s, let\'s play!', $name);
    }

    public function sayDreams(): string
    {
        return sprintf('I would like to be a(n) %s when I grow up.', $this->listDreams($this->aspirations));
    }

    /**
     * @param string[] $aspirations
     * @return string
     */
    private function listDreams(array $aspirations): string
    {
        $aspirationsAsString = '';

        for ($i = 0; $i < count($aspirations) - 1; $i++) {
            if ($i === count($aspirations) - 2) {
                $aspirationsAsString .= $aspirations[$i];
            } else {
                $aspirationsAsString .= $aspirations[$i].', ';
            }
        }

        $aspirationsAsString .= ' or '.$aspirations[count($aspirations) - 1];

        return $aspirationsAsString;
    }
}
