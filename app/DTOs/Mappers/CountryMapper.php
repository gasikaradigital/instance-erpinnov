<?php

namespace App\DTOs\Mappers;

use App\DTOs\CountryDTO;

class CountryMapper{
    // Mappers
    public function mapToCountry($apiData): CountryDTO
    {
        return new CountryDTO(
            id: (int) $apiData['id'],
            code: (string) $apiData['code'],
            label: (string)$apiData['label'],
            active: (int) $apiData['active'],
            codeIso: (string) $apiData['code_iso'],
            numericCode: (int) $apiData['numeric_code']
        );
    }
}