<?php

namespace App\Services;

use App\DTOs\Mappers\ThirdpartyMapper;
use Exception;
use Illuminate\Support\Facades\Http;
use App\DTOs\ThirdPartyDTO;
use App\Helpers\DolibarrServiceUtils;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class ThirdpartyService
{
    public function __construct(
        private string $baseUrl,
        private string $apiKey,
        private ThirdpartyMapper $thirdpartyMapper
    ) {}

    /**
     * Récupère tous les tiers avec différents niveaux de chargement
     * 
     * @param int $limit Nombre maximum de résultats (0 = pas de limite)
     * @param array $load Niveau de chargement ('commercial', 'category', 'full')
     * @return ThirdPartyDTO[]|null
     */
    public function fetchAllThirdparties(int $limit = 0, array $load = []): ?array
    {
        try {
            // Validation du paramètre load
            $validLoadOptions = ['country', 'commercial', 'category', 'full'];
            $invalidOption = array_diff($load, $validLoadOptions);
            if (!empty($invalidOption)) {
                throw new InvalidArgumentException("Option de chargement invalide: " . implode(', ', $invalidOption));
            }

            // Construction de l'URL
            $url = $this->baseUrl . '/api/index.php/thirdparties';
            if ($limit > 0) {
                $url .= '?limit=' . $limit;
            }

            // Requête API
            $response = Http::withHeaders(['DOLAPIKEY' => DolibarrServiceUtils::decryptApiKey($this->apiKey)])->get($url);

            if (!$response->successful()) {
                throw new Exception('Erreur API: ' . $response->status());
            }

            // Mapping des données
            return collect($response->json())->map(function ($apiData) use ($load) {
                return $this->thirdpartyMapper->mapToThirdparty(
                    $apiData,
                    withCommercial: !empty(array_intersect($load, ['commercial', 'full'])),
                    withCategories: !empty(array_intersect($load, ['category', 'full'])),
                    withCountry: !empty(array_intersect($load, ['country', 'full']))
                );
            })->all();
        } catch (Exception $e) {
            dump($e->getMessage());
            Log::error('Erreur récupération tiers: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Récupère un tiers par son ID avec différents niveaux de chargement
     * 
     * @param int $id ID du tiers
     * @param array $load Niveau de chargement ('basic', 'commercial', 'category', 'full')
     * @return ThirdPartyDTO|null
     * @throws InvalidArgumentException Si l'option de chargement est invalide
     */
    public function fetchThirdpartieById(int $id, array $load = []): ?ThirdPartyDTO
    {
        try {
            // Validation du paramètre load
            // Validation du paramètre load
            $validLoadOptions = ['country', 'commercial', 'category', 'full'];
            $invalidOption = array_diff($load, $validLoadOptions);
            if (!empty($invalidOption)) {
                throw new InvalidArgumentException("Option de chargement invalide: " . implode(', ', $invalidOption));
            }

            // Requête API
            $response = Http::withHeaders([
                'DOLAPIKEY' => DolibarrServiceUtils::decryptApiKey($this->apiKey)
            ])->get($this->baseUrl . '/api/index.php/thirdparties/' . $id);

            if (!$response->successful()) {
                throw new Exception('Erreur API: ' . $response->status());
            }

            // Mapping avec options de chargement
            return $this->thirdpartyMapper->mapToThirdparty(
                $response->json(),
                withCommercial: !empty(array_intersect($load, ['commercial', 'full'])),
                withCategories: !empty(array_intersect($load, ['category', 'full'])),
                withCountry: !empty(array_intersect([$load], ['country', 'full']))
            );
        } catch (Exception $e) {
            Log::error("Erreur récupération tiers ID $id: " . $e->getMessage());
            return null;
        }
    }
}
