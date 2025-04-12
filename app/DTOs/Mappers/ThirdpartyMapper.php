<?php

namespace App\DTOs\Mappers;

use App\DTOs\Proxies\LazyLoadedCategoryProxy;
use App\DTOs\Proxies\LazyLoadedCommercialProxy;
use App\DTOs\Proxies\LazyLoadedCountryProxy;
use App\DTOs\ThirdPartyDTO;
use App\Services\CategoryResolver;
use App\Services\CommercialResolver;
use App\Services\SetupResolverService;

class ThirdpartyMapper
{

    public function __construct(
        protected CommercialResolver $commercialResolver,
        protected CategoryResolver $categoryResolver,
        protected SetupResolverService $setupResolverService
    ) {}

    /**
     * Transforme les tier dans la reponse de l'api de dolibarr en objet 
     *
     * @return ThirdPartyDTO
     */
    public function mapToThirdparty(
        $apiData,
        bool $withCommercial = false,
        bool $withCategories = false,
        bool $withCountry = false,
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
            countryProxy: new LazyLoadedCountryProxy(
                countryId:$apiData['country_id'],
                resolver:$this->setupResolverService
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
            $thirdpartie->includeCommercials();
        }
        if ($withCategories) {
            $thirdpartie->includeCategories();
        }
        if ($withCountry){
            $thirdpartie->includeCountry();
        }

        return $thirdpartie;
    }
}
