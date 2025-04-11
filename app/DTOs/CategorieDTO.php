<?php
namespace App\DTOs;

class CategoryDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $label,
        public readonly ?string $description,
        public readonly ?string $color,
        public readonly int $type,
        public readonly bool $visible
    ) {}
}