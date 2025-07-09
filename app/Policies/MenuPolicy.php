<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Menu;
use App\Models\User;

class MenuPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function view(User $user, Menu $menu): bool
    {
        return $user->isAdmin();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Menu $menu): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Menu $menu): bool
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Menu $menu): bool
    {
        return $this->delete($user, $menu);
    }

    public function forceDelete(User $user, Menu $menu): bool
    {
        return $this->delete($user, $menu);
    }
}
