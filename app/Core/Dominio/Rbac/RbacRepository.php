<?php

namespace App\Core\Dominio\Rbac;

interface RbacRepository
{
    public function hasPermission(string $userId, string $permission): bool;
}