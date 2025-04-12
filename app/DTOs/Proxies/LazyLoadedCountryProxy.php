<?php

namespace App\DTOs\Proxies;

use App\DTOs\CountryDTO;
use App\Services\SetupResolverService;

class LazyLoadedCountryProxy
{
    private ?CountryDTO $country = null;

    public function __construct(
        private ?int $countryId,
        private SetupResolverService $resolver
    ) {}

    public function fetchCountry() : ?CountryDTO {
        if($this->countryId==null){
            return null;
        }
        if($this->country === null){
            $this->country = $this->resolver->resolveForCountry($this->countryId);
        }
        return $this->country;
    }
}
