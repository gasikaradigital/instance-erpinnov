<?php

namespace App\Services;

use App\DTOs\Mappers\ContactMapper;
use App\Helpers\DolibarrServiceUtils;
use Exception;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;

use function PHPUnit\Framework\isEmpty;

class ContactService
{
    private $validLoadOptions = ['categories', 'roles', 'full'];
    public function __construct(
        private readonly string $dolibarrUrl,
        private readonly string $apiKey,
        private ContactMapper $contactMapper
    ) {}

    public function getAllContacts(int $limit = 0, array $load = []): ?array
    {
        if (!$this->validatedLoaderOptions($load)) {
            throw new InvalidArgumentException("Un ou plusieur option de chargement sont invalides , option de chargement valides : " . implode(' ', $this->validLoadOptions));
            return null;
        }

        $limitQuery = '';
        if ($limit > 0) {
            $limitQuery = 'limit=' . $limit;
        }
        try {
            $response = Http::withHeaders([
                'DOLAPIKEY' => DolibarrServiceUtils::decryptApiKey($this->apiKey)
            ])->get($this->dolibarrUrl . '/api/index.php/contacts?' . $limitQuery);

            if (!$response->successful()) {
                throw new Exception('Erreur API: ' . $response->status());
            }

            return collect($response->json())->map(function ($data) use ($load) {

                $withRoles = !empty(array_intersect($load, ['full', 'roles']));
                $withCategories = !empty(array_intersect($load, ['full', 'categories']));

                return $this->contactMapper->mapToContactDTO($data, withRoles: $withRoles, withCategories: $withCategories);
            })->all();
        } catch (Exception $e) {
            dump('erreur : ' . $e->getMessage());
        }

        return null;
    }

    public function validatedLoaderOptions(array $load): bool
    {
        if (isEmpty($load)) {
            return true;
        }

        return empty(count(array_diff($load, $this->validLoadOptions)));
    }
}
