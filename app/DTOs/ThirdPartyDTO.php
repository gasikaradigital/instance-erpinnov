<?php

namespace App\DTOs;

use App\DTOs\Proxies\LazyLoadedCategoryProxy;
use App\DTOs\Proxies\LazyLoadedCommercialProxy;
use App\DTOs\Proxies\LazyLoadedCountryProxy;

class ThirdPartyDTO
{
    private ?array $commercials = null;
    private ?array $categories = null;
    private ?CountryDTO $country = null;

    public function __construct(
        // Identité
        public readonly int $id,
        public readonly string $reference,
        public readonly string $name,
        public readonly ?string $firstName,
        public readonly ?string $lastName,
        public readonly ?string $nameAlias,

        // Proxies
        private LazyLoadedCommercialProxy $commercialProxy,
        private LazyLoadedCategoryProxy $categoryProxy,
        private LazyLoadedCountryProxy $countryProxy,

        // Contacts
        public readonly ?string $email,
        public readonly ?string $phone,
        public readonly ?string $mobilePhone,
        public readonly ?string $fax,
        public readonly ?string $website,

        // Adresse
        public readonly ?string $address,
        public readonly ?string $zip,
        public readonly ?string $town,
        public readonly ?string $countryId,
        public readonly ?string $countryCode,

        // Type
        public readonly int $client,
        public readonly int $fournisseur,
        public readonly int $prospect,

        // Statut juridique/fiscal
        public readonly ?string $vatNumber,
        public readonly ?string $siret,
        public readonly bool $vatLiable,
        public readonly string $legalForm,
        public readonly float $capital,

        // Codes
        public readonly ?string $customerCode,
        public readonly ?string $supplierCode,
        public readonly ?string $prospectLevel,

        // Dates
        public readonly \DateTimeInterface $createdAt,
        public readonly \DateTimeInterface $updatedAt,

        // Métadonnées
        public readonly ?string $publicNote,
        public readonly ?string $defaultLanguage,

        // Status
        public readonly string $status
    ) {}

    public function getFullName(): string
    {
        return $this->firstName && $this->lastName
            ? trim($this->firstName . ' ' . $this->lastName)
            : $this->name;
    }


    public function getFormattedAddress(): string
    {
        return implode("\n", array_filter([
            $this->address,
            $this->zip . ' ' . $this->town
        ]));
    }

    public function isActive(): bool
    {
        return $this->status !== 0;
    }

    /**
     * @return CommercialUser[]
     */
    public function getCommercials(): array
    {
        return $this->commercials;
    }

    public function includeCommercials(): void
    {
        if ($this->commercials === null) {
            $this->commercials = $this->commercialProxy->fetchCommercial();
        }
    }

    /**
     * @return Country
     */
    public function getCountry(): ?CountryDTO
    {
        return $this->country;
    }

    public function includeCountry(): void
    {
        if ($this->country === null) {
            $this->country = $this->countryProxy->fetchCountry();
        }
    }

    /**
     * @return CategorieDTO[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    public function includeCategories(): void
    {
        if ($this->categories === null) {
            $this->categories = $this->categoryProxy->fetchCategories();
        }
    }

    /**
     * @return bool
     */
    public function hasCommercials(): bool
    {
        return !empty($this->getCommercials());
    }

    /**
     * @return bool
     */
    public function hasCategories(): bool
    {
        return !empty($this->getCategories());
    }
}
