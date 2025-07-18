<?php declare(strict_types=1);

namespace App\task198\entity;

final class MyImmutable extends Immutable
{
    private $store;
    private $hasInitialised;

    public function __construct(string $data = '')
    {
        if ($this->hasInitialised) {
            return;
        }

        $this->store = $data;
        $this->hasInitialised = true;
    }

    public function __set(string $name, $value)
    {
        return;
    }

    public function getData(): string
    {
        return $this->store;
    }
}
