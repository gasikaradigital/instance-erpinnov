<?php

namespace App\DTOs;

class CommercialUser
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly ?string $status,
        public readonly ?string $lastname,
        public readonly ?string $firstname,
        public readonly ?string $email,
    ) {}
    public function getFullName(): string{
            return trim($this->firstname + " " + $this->lastname);
    }
}
