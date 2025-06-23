<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\StatementAssets;
use App\Models\User;

class StatementAssetsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StatementAssets $statementAssets): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StatementAssets $statementAssets): bool
    {
        return $user->isAdmin()
            || $user->isValidator()
            || ($user->isContributor() && $user->is($statementAssets->author));
    }

    public function validate(User $user, StatementAssets $statementAssets): bool
    {
        return blank($statementAssets->validator_id) && ($user->isAdmin() || $user->isValidator());
    }

    public function delete(User $user, StatementAssets $statementAssets): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StatementAssets $statementAssets): bool
    {
        return $this->delete($user, $statementAssets);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StatementAssets $statementAssets): bool
    {
        return $this->delete($user, $statementAssets);
    }
}
