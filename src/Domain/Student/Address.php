<?php

namespace Alura\Calisthenics\Domain;

class Address
{
    public function __construct(
        private string $street,
        private string $number,
        private string $province,
        private string $city,
        private string $state,
        private string $country,
    ) {
    }
}
