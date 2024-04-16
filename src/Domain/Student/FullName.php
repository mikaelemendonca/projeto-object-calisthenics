<?php

namespace Alura\Calisthenics\Domain;

class FullName
{
    public function __construct(
        private string $firistName,
        private string $lastName
    ) {
    }

    public function __toString(): string
    {
        return "{$this->firistName} {$this->lastName}";
    }
}
