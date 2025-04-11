<?php
namespace App\DTOs\Proxies;

use App\DTOs\CommercialUser;
use App\Services\ThirdpartyService;

class LazyLoadedCommercialProxy
{

    public function __construct(
        private ?int $commercialId,
        private string $parentEntityType,
        private CommercialResolver $resolver
    ) {}
    
    public function fetchCommercial(): array
    {
        return $this->resolver->resolveFor($this->parentEntityType, $this->commercialId);
    }
}

// Service dédié
class CommercialResolver
{
    public function __construct(
        private ThirdPartyService $thirdPartyService
    ) {}

    /**
     * @return CommercialUser[]
     */
    public function resolveFor(string $entityType, int $id): array
    {
        return match($entityType) {
            'THIRDPARTY' => $this->thirdPartyService->getCommercialRepresentatives($id)
        };
    }
}