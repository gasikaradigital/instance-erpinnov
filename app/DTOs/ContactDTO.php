<?php

namespace App\DTOs;

use App\DTOs\Proxies\ContactRoleProxy;
use App\DTOs\Proxies\LazyLoadedCategoryProxy;
use Carbon\Carbon;

class ContactDTO
{
    private ?array $categories = null;
    private ?array $roles = null;

    public function __construct(
        // Identité
        public readonly int $id,
        public readonly string $lastname,
        public readonly string $firstname,
        public readonly string $fullname,
        public readonly string $civility,

        // Coordonnées personnelles
        public readonly string $email,
        public readonly ?string $address,
        public readonly ?string $zip,
        public readonly ?string $town,

        // Téléphones et contact
        public readonly ?string $phone_pro,
        public readonly ?string $phone_mobile,
        public readonly ?string $fax,

        // Métadonnées
        public readonly Carbon $createdAt,
        public readonly Carbon $updatedAt,

        // Infos spécifiques
        public readonly ContactRoleProxy $roleProxy,
        public readonly LazyLoadedCategoryProxy $categoryProxy,
        public readonly ?string $contactCode = null,
        public readonly ?string $photo = null,
    ) {}

    public function getFormattedAddress(): string
    {
        return implode(', ', array_filter([$this->address, $this->zip, $this->town]));
    }

    public function includeCategories(): void
    {
        if ($this->categories === null) {
            $this->categories = $this->categoryProxy->fetchCategories();
        }
    }

    public function getCategorie(): ?array
    {
        return $this->categories;
    }



    public function includeRoles() :void{
        $this->roles = $this->roleProxy->get();
    }

    public function getRoles(){
        return $this->roles;
    }
}
