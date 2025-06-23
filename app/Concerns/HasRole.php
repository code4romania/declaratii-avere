<?php

declare(strict_types=1);

namespace App\Concerns;

use App\Enums\UserRole;

trait HasRole
{
    public function initializeHasRole(): void
    {
        $this->casts['role'] = UserRole::class;

        $this->fillable[] = 'role';
    }

    public function hasRole(UserRole | string $role): bool
    {
        return $this->role->is($role);
    }

    public function isAdmin(): bool
    {
        return $this->hasRole(UserRole::ADMIN);
    }

    public function isValidator(): bool
    {
        return $this->hasRole(UserRole::VALIDATOR);
    }

    public function isContributor(): bool
    {
        return $this->hasRole(UserRole::CONTRIBUTOR);
    }

    public function isViewer(): bool
    {
        return $this->hasRole(UserRole::VIEWER);
    }
}
