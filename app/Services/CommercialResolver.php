<?php

namespace App\Services;

use App\DTOs\CommercialUser;
use App\DTOs\Mappers\CommercialUserMapper;
use App\Helpers\DolibarrServiceUtils;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CommercialResolver
{
    public function __construct(
        private string $dolibarrUrl,
        private string $apiKey,
        private CommercialUserMapper $commercialUserMapper
    ) {}

    /**
     * @return CommercialUser[]
     */
    public function resolveFor(string $entityType, int $id): array
    {
        return match ($entityType) {
            'THIRDPARTY' => $this->getCommercialRepresentatives($id)
        };
    }


    /**
     * Récupère les représentants commerciaux d'un tiers
     * 
     * @return CommercialUser[]
     * @throws \Exception
     */
    public function getCommercialRepresentatives(int $thirdpartyId): ?array
    {
        try {
            $response = Http::withHeaders([
                'DOLAPIKEY' => DolibarrServiceUtils::decryptApiKey($this->apiKey)
            ])->get("{$this->dolibarrUrl}/api/index.php/thirdparties/{$thirdpartyId}/representatives");

            if (!$response->successful()) {
                throw new \Exception("API error: " . $response->status());
            }

            return array_map(
                fn(array $repData) => $this->commercialUserMapper->mapToCommercialUser($repData),
                $response->json()
            );
        } catch (\Exception $e) {
            Log::error("Failed to fetch commercial representatives: " . $e->getMessage());
            throw $e;
        }
    }

}
