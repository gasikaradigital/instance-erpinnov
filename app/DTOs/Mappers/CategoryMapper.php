<?php

namespace App\DTOs\Mappers;

use App\DTOs\CategoryDTO;

class CategoryMapper
{
    public function mapToCategory(array $data): CategoryDTO
    {
        return new CategoryDTO(
            id: (int)$data['id'],
            label: $data['label'],
            description: $data['description'] ?? null,
            color: $data['color'] ?? null,
            type: (int)$data['type'],
            visible: (bool)$data['visible']
        );
    }
}
