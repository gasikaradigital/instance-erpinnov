<?php

namespace App\Services;

use App\DTOs\CommercialUser;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CommercialResolver
{
    public function __construct(
        private string $dolibarrUrl,
        private string $apiKey
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
     * Récupère les représentants commerciaux d'un tiers
     * 
     * @return CommercialUser[]
     * @throws \Exception
     */
    public function getCommercialRepresentatives(int $thirdpartyId): ?array
    {
        try {
            $response = Http::withHeaders([
                'DOLAPIKEY' => $this->decryptApiKey($this->apiKey)
            ])->get("{$this->dolibarrUrl}/api/index.php/thirdparties/{$thirdpartyId}/representatives");

            if (!$response->successful()) {
                throw new \Exception("API error: " . $response->status());
            }

            return array_map(
                fn(array $repData) => $this->mapToCommercialUserDTO($repData),
                $response->json()
            );
        } catch (\Exception $e) {
            Log::error("Failed to fetch commercial representatives: " . $e->getMessage());
            throw $e;
        }
    }

    private function mapToCommercialUserDTO(array $apiData): CommercialUser
    {
        return new CommercialUser(
            id: $apiData['id'],
            name: $apiData['name'] ?? '',
            status: $apiData['status'] ?? null,
            lastname: $apiData['lastname'] ?? null,
            firstname: $apiData['firstname'] ?? null,
            email: $apiData['email'] ?? null
        );
    }
}
