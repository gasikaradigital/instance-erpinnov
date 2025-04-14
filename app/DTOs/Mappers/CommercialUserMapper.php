<?php

namespace App\DTOs\Mappers;

use App\DTOs\CommercialUser;

class CommercialUserMapper
{
    /**
     * Transforme le representatives dans la reponse de l'api de dolibarr en objet
     * 
     * @return CommercialUser
     */
    public function mapToCommercialUser(array $apiData): CommercialUser
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
