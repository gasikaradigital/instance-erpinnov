<?php

namespace App\DTOs\Mappers;

use App\DTOs\ContactDTO;
use App\DTOs\Proxies\ContactRoleProxy;
use App\DTOs\Proxies\LazyLoadedCategoryProxy;
use App\Services\CategoryResolver;
use Carbon\Carbon;

class ContactMapper
{
    public function __construct(
        private readonly CategoryResolver $categoryResolver
    ) {}

    public function mapToContactDTO($apiData, $withRoles = false, $withCategories = false): ContactDTO
    {

        $contactDto = new ContactDTO(
            id: (int) $apiData['id'],
            lastname: $apiData['lastname'],
            firstname: $apiData['firstname'],
            email: $apiData['mail'] ?? '',
            fullname: $this->buildFullName($apiData),
            address: $apiData['address'] ?? null,
            zip: $apiData['zip'] ?? null,
            town: $apiData['town'] ?? null,
            phone_pro: $apiData['phone_pro'] ?? null,
            phone_mobile: $apiData['phone_mobile'] ?? null,
            fax: $apiData['fax'] ?? null,
            civility: $this->mapCivility($apiData['civility_code'] ?? null),
            createdAt: Carbon::createFromTimestamp($apiData['date_creation']),
            updatedAt: Carbon::createFromTimestamp($apiData['date_modification']),
            roleProxy: $this->createRoleProxy($apiData['roles'] ?? null),
            contactCode: $apiData['array_options']['options_code_contact'] ?? null,
            photo: $apiData['photo'] ? $this->buildPhotoUrl($apiData['photo']) : null,
            categoryProxy: new LazyLoadedCategoryProxy(
                resolveId: (int) $apiData['id'],
                entityType: "CONTACT",
                resolver: $this->categoryResolver
            )
        );

        if($withCategories){
            $contactDto->categoryProxy->fetchCategories();
        }

        if($withRoles){
            $contactDto->roleProxy->expose();
            $contactDto->roleProxy->get();
        }
        return $contactDto;
    }

    private function buildFullName(array $data): string
    {
        return trim(implode(' ', [
            $data['firstname'],
            $data['lastname']
        ]));
    }

    private function mapCivility(?string $code): string
    {
        return match ($code) {
            'MR' => 'Monsieur',
            'MME' => 'Madame',
            'MLLE' => 'Mademoiselle',
            default => 'Non spécifié'
        };
    }

    private function createRoleProxy(?array $rolesData): ContactRoleProxy
    {
        $normalizedRoles = [];

        if ($rolesData && is_array($rolesData)) {
            foreach ($rolesData as $role) {
                if (is_array($role)) {
                    $normalizedRoles[] = $role;
                }
            }
        }

        return new ContactRoleProxy($normalizedRoles ?: null);
    }

    private function buildPhotoUrl(string $photoPath): string
    {
        return config('app.media_url') . '/contacts/' . $photoPath;
    }
}
