<?php

namespace App\Core\Application;

use App\Infraestructura\RbacRepositoryPg;

class RbacService
{
    private $rbacRepository;

    public function __construct(        
    ) {
        $this->rbacRepository = new RbacRepositoryPg();
    }

    public function hasPermission(string $userId, string $permission): bool
    {
        return $this->rbacRepository->hasPermission($userId, $permission);
    }
}
