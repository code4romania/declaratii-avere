<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Institution;
use App\Models\User;

class InstitutionPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Institution $institution): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Institution $institution): bool
    {
        return true;
    }

    public function delete(User $user, Institution $institution): bool
    {
        return true;
    }

    public function restore(User $user, Institution $institution): bool
    {
        return $this->delete($user, $institution);
    }

    public function forceDelete(User $user, Institution $institution): bool
    {
        return $this->delete($user, $institution);
    }
}
