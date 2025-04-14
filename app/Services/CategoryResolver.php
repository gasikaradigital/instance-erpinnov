<?php

namespace App\Services;

use App\DTOs\CategoryDTO;
use App\DTOs\Mappers\CategoryMapper;
use App\Helpers\DolibarrServiceUtils;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;

class CategoryResolver
{
    public function __construct(
        private string $dolibarrUrl,
        private string $apiKey,
        private CategoryMapper $categoryMapper
    ) {}

    public function resolveFor(string $entityType, int $entityId): array
    {
        return match($entityType) {
            'THIRDPARTY' => $this->getThirdPartyCategories($entityId),
            'CONTACT'=>$this->getContactCategories($entityId),
            default     => throw new InvalidArgumentException("Unsupported entity type")
        };
    }

    /**
     * @return CategoryDTO[]
     */
    public function getThirdPartyCategories(int $thirdPartyId): array
    {
        $response = Http::withHeaders([
            'DOLAPIKEY' => DolibarrServiceUtils::decryptApiKey($this->apiKey)
        ])->get("{$this->dolibarrUrl}/api/index.php/thirdparties/{$thirdPartyId}/categories");

        return array_map(
            fn(array $categoryData) => $this->categoryMapper->mapToCategory($categoryData),
            $response->json()
        );
    }

    /**
     * @return CategoryDTO[]
     */
    public function getContactCategories(int $thirdPartyId): array
    {
        $response = Http::withHeaders([
            'DOLAPIKEY' => DolibarrServiceUtils::decryptApiKey($this->apiKey)
        ])->get("{$this->dolibarrUrl}/api/index.php/contacts/{$thirdPartyId}/categories");

        return array_map(
            fn(array $categoryData) => $this->categoryMapper->mapToCategory($categoryData),
            $response->json()
        );
    }
}