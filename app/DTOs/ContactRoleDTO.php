<?php

namespace App\DTOs;

class ContactRoleDTO{
    public function __construct(
        public readonly int $id,
        public readonly ?string $socid,
        public readonly ?string $element,
        public readonly ?string $label,
        public readonly ?string $code,
        public readonly ?string $source
    )
    {
        
    }
}