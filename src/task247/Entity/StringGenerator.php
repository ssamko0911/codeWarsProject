<?php declare(strict_types=1);

namespace App\task247\Entity;

abstract class StringGenerator
{
    public function __construct(
        protected Number $metadata,
    )
    {
    }

    abstract public function generate(): string;
}