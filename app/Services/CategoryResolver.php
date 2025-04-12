<?php

namespace App\Services;

use App\DTOs\CategoryDTO;
use App\DTOs\Mappers\CategoryMapper;
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
            default     => throw new InvalidArgumentException("Unsupported entity type")
        };
    }

    private function decryptApiKey(string $encrypted): string
    {
        $key = sodium_crypto_generichash(
            config('app.key'), '', SODIUM_CRYPTO_SECRETBOX_KEYBYTES
        );
        $nonce = substr($encrypted, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        $ciphertext = substr($encrypted, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        return sodium_crypto_secretbox_open($ciphertext, $nonce, $key);
    }

    /**
     * @return CategoryDTO[]
     */
    public function getThirdPartyCategories(int $thirdPartyId): array
    {
        $response = Http::withHeaders([
            'DOLAPIKEY' => $this->decryptApiKey($this->apiKey)
        ])->get("{$this->dolibarrUrl}/api/index.php/thirdparties/{$thirdPartyId}/categories");

        return array_map(
            fn(array $categoryData) => $this->categoryMapper->mapToCategory($categoryData),
            $response->json()
        );
    }
}