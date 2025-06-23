<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\StatementInterests;
use App\Models\User;

class StatementInterestsPolicy
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
    public function view(User $user, StatementInterests $statementInterests): bool
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
    public function update(User $user, StatementInterests $statementInterests): bool
    {
        return $user->isAdmin()
            || $user->isValidator()
            || ($user->isContributor() && $user->is($statementInterests->author));
    }

    public function validate(User $user, StatementInterests $statementInterests): bool
    {
        return blank($statementInterests->validator_id) && ($user->isAdmin() || $user->isValidator());
    }

    public function delete(User $user, StatementInterests $statementInterests): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StatementInterests $statementInterests): bool
    {
        return $this->delete($user, $statementInterests);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StatementInterests $statementInterests): bool
    {
        return $this->delete($user, $statementInterests);
    }
}
