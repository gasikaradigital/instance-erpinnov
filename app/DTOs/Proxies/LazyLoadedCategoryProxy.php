<?php

namespace App\DTOs\Proxies;

use App\DTOs\CategoryDTO;
use App\Services\CategoryResolver;
use InvalidArgumentException;

class LazyLoadedCategoryProxy
{
    /** @var CategoryDTO[]|null */
    private ?array $categories = null;

    public function __construct(
        private int $resolveId,
        private string $entityType,
        private CategoryResolver $resolver
    ) {
        $this->validateEntityType();
    }

    /**
     * @return CategoryDTO[]
     */
    public function fetchCategories(): array
    {
        if ($this->categories === null) {
            $this->categories = $this->resolver->resolveFor(
                $this->entityType,
                $this->resolveId
            );
        }
        return $this->categories;
    }

    public function isLoaded(): bool
    {
        return $this->categories !== null;
    }

    public function getMainCategory(): ?CategoryDTO
    {
        $categories = $this->fetchCategories();
        return $categories[0] ?? null;
    }

    private function validateEntityType(): void
    {
        $supportedTypes = ['THIRDPARTY', 'CONTACT', 'PRODUCT'];
        
        if (!in_array($this->entityType, $supportedTypes)) {
            throw new InvalidArgumentException(
                "Unsupported entity type: {$this->entityType}. "
                . "Supported types: " . implode(', ', $supportedTypes)
            );
        }
    }
}