<?php

namespace App\DTOs;

class CountryDTO
{
  public function __construct(
    private readonly int $id,
    private readonly string $code,
    private readonly string $label,
    private readonly string $active,
    private readonly ?string $codeIso,
    private readonly ?int $numericCode
  ) {}
}
