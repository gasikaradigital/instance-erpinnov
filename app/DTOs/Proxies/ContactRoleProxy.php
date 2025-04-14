<?php

namespace App\DTOs\Proxies;

use App\DTOs\ContactRoleDTO;

class ContactRoleProxy
{
    private ?array $roles = null;
    private bool $shouldExpose = false;

    public function __construct(
        private readonly ?array $roleData
    ) {}


    public function expose(): void
    {
        $this->shouldExpose = true;
    }

    public function hide(): void
    {
        $this->shouldExpose = false;
    }
    public function get(): ?array
    {
        if (!$this->shouldExpose || empty($this->roleData)) {
            return null;
        } else {
            $this->roles = collect($this->roleData)->map(function ($data) {
                return new ContactRoleDTO(
                    id: (int) $data['id'],
                    socid: (string) $data['socid'],
                    element: (string) $data['element'],
                    label: (string) $data['label'],
                    code: (string) $data['code'],
                    source: (string) $data['source']
                );
            })->all();
        }
        return $this->roles;
    }
}
