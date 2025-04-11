<?php
namespace App\DTOs\Proxies;

use App\Services\CommercialResolver;

class LazyLoadedCommercialProxy
{
    /** @var CategoryDTO[]|null */
    private ?array $commercials = null;

    public function __construct(
        private ?int $resolveId,
        private string $entityType,
        private CommercialResolver $resolver
    ) {}
    
    public function fetchCommercial(): array
    {
        if($this->commercials == null){
            $this->commercials = $this->resolver->resolveFor($this->entityType, $this->resolveId);
        }
        return $this->commercials;
    }

}