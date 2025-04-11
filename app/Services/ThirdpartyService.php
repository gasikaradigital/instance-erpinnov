<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use App\DTOs\ThirdPartyDTO;

use App\DTOs\Proxies\LazyLoadedCategoryProxy;
use App\DTOs\Proxies\LazyLoadedCommercialProxy;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class ThirdpartyService
{
    public function __construct(
        private string $baseUrl,
        private string $apiKey,
        private CommercialResolver $commercialResolver,
        private CategoryResolver $categoryResolver
    ) {}

    private function decryptApiKey(string $encrypted): string
    {
        $key = sodium_crypto_generichash(
            config('app.key'),
            '',
            SODIUM_CRYPTO_SECRETBOX_KEYBYTES
        );
        $nonce = substr($encrypted, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        $ciphertext = substr($encrypted, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        return sodium_crypto_secretbox_open($ciphertext, $nonce, $key);
    }
    /**
     * Récupère tous les tiers avec différents niveaux de chargement
     * 
     * @param int $limit Nombre maximum de résultats (0 = pas de limite)
     * @param string $load Niveau de chargement ('basic', 'commercial', 'category', 'full')
     * @return ThirdPartyDTO[]|null
     */
    public function fetchAllThirdparties(int $limit = 0, string $load = 'basic'): ?array
    {
        try {
            // Validation du paramètre load
            $validLoadOptions = ['basic', 'commercial', 'category', 'full'];
            if (!in_array($load, $validLoadOptions)) {
                throw new InvalidArgumentException("Option de chargement invalide. Options valides: " . implode(', ', $validLoadOptions));
            }

            // Construction de l'URL
            $url = $this->baseUrl . '/api/index.php/thirdparties';
            if ($limit > 0) {
                $url .= '?limit=' . $limit;
            }

            // Requête API
            $response = Http::withHeaders(['DOLAPIKEY' => $this->decryptApiKey($this->apiKey)])->get($url);

            if (!$response->successful()) {
                throw new Exception('Erreur API: ' . $response->status());
            }

            // Mapping des données
            return collect($response->json())->map(function ($apiData) use ($load) {
                return $this->mapThirdparty(
                    $apiData,
                    withCommercial: in_array($load, ['commercial', 'full']),
                    withCategories: in_array($load, ['category', 'full'])
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
     * @param string $load Niveau de chargement ('basic', 'commercial', 'category', 'full')
     * @return ThirdPartyDTO|null
     * @throws InvalidArgumentException Si l'option de chargement est invalide
     */
    public function fetchThirdpartieById(int $id, string $load = 'basic'): ?ThirdPartyDTO
    {
        try {
            // Validation du paramètre load
            $validLoadOptions = ['basic', 'commercial', 'category', 'full'];
            if (!in_array($load, $validLoadOptions)) {
                throw new InvalidArgumentException(
                    "Option de chargement invalide. Options valides: " .
                        implode(', ', $validLoadOptions)
                );
            }

            // Requête API
            $response = Http::withHeaders([
                'DOLAPIKEY' => $this->decryptApiKey($this->apiKey)
            ])->get($this->baseUrl . '/api/index.php/thirdparties/' . $id);

            if (!$response->successful()) {
                throw new Exception('Erreur API: ' . $response->status());
            }

            // Mapping avec options de chargement
            return $this->mapThirdparty(
                $response->json(),
                withCommercial: in_array($load, ['commercial', 'full']),
                withCategories: in_array($load, ['category', 'full'])
            );
        } catch (Exception $e) {
            Log::error("Erreur récupération tiers ID $id: " . $e->getMessage());
            return null;
        }
    }

    // Mappers
    private function mapThirdparty(
        $apiData,
        bool $withCommercial = false,
        bool $withCategories = false
    ): ThirdPartyDTO {
        $thirdpartie =  new ThirdPartyDTO(
            id: (int)$apiData['id'],
            reference: $apiData['ref'],
            name: $apiData['name'],
            firstName: $apiData['firstname'],
            lastName: $apiData['lastname'],
            nameAlias: $apiData['name_alias'],
            commercialProxy: new LazyLoadedCommercialProxy(
                resolveId: $apiData['id'] ?? null,
                entityType: 'THIRDPARTY',
                resolver: $this->commercialResolver
            ),
            categoryProxy: new LazyLoadedCategoryProxy(
                entityType: 'THIRDPARTY',
                resolveId: $apiData['id'],
                resolver: $this->categoryResolver
            ),

            email: $apiData['email'],
            phone: $apiData['phone'],
            mobilePhone: $apiData['phone_mobile'],
            fax: $apiData['fax'],
            website: $apiData['url'],

            address: $apiData['address'],
            zip: $apiData['zip'],
            town: $apiData['town'],
            countryId: $apiData['country_id'],
            countryCode: $apiData['country_code'],

            vatNumber: !empty($apiData['tva_intra']) ? $apiData['tva_intra'] : null,
            siret: !empty($apiData['idprof2']) ? $apiData['idprof2'] : null,
            vatLiable: $apiData['tva_assuj'] == '1',
            legalForm: $apiData['forme_juridique'] ?? '',
            capital: (float)$apiData['capital'],

            client: (int)$apiData['client'],
            prospect: (int) $apiData['prospect'],
            fournisseur: (int)$apiData['fournisseur'],

            customerCode: $apiData['code_client'],
            supplierCode: $apiData['code_fournisseur'],
            prospectLevel: $apiData['status_prospect_label'],

            createdAt: \DateTime::createFromFormat('U', $apiData['date_creation']),
            updatedAt: \DateTime::createFromFormat('U', $apiData['date_modification']),

            publicNote: $apiData['note_public'],
            defaultLanguage: $apiData['default_lang'],

            status: $apiData['status']
        );

        if ($withCommercial) {
            $thirdpartie->getCommercials();
        }
        if ($withCategories) {
            $thirdpartie->getCategories();
        }

        return $thirdpartie;
    }
}
