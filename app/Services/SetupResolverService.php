<?php

namespace App\Services;

use App\DTOs\CountryDTO;
use App\DTOs\Mappers\CountryMapper;
use App\Helpers\DolibarrServiceUtils;
use Illuminate\Support\Facades\Http;

class SetupResolverService
{
    public function __construct(
        private string $dolibarrUrl,
        private string $apiKey,
        private CountryMapper $countryMapper
    ) {}

    /**
     * Recupère les country via son id
     * 
     * @return CountryDTO||null
     */
    public function resolveForCountry(int $id) : ?CountryDTO
    {
        try {
            $countryResponse = Http::withHeaders([
                'DOLAPIKEY' => DolibarrServiceUtils::decryptApiKey($this->apiKey)
            ])->get($this->dolibarrUrl . '/api/index.php/setup/dictionary/countries/' . $id);

            if ($countryResponse->successful()) {
                $country = $countryResponse->json();
                return $this->countryMapper->mapToCountry($country);
            }
            return null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
