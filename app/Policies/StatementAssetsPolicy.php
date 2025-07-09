<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\StatementAssets;
use App\Models\User;

class StatementAssetsPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, StatementAssets $statementAssets): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, StatementAssets $statementAssets): bool
    {
        return $user->isAdmin()
            || $user->isValidator()
            || ($user->isContributor() && $user->id === $statementAssets->author_id);
    }

    public function validate(User $user, StatementAssets $statementAssets): bool
    {
        return blank($statementAssets->validator_id) && ($user->isAdmin() || $user->isValidator());
    }

    public function delete(User $user, StatementAssets $statementAssets): bool
    {
        return $user->isAdmin();
    }

    public function restore(User $user, StatementAssets $statementAssets): bool
    {
        return $this->delete($user, $statementAssets);
    }

    public function forceDelete(User $user, StatementAssets $statementAssets): bool
    {
        return $this->delete($user, $statementAssets);
    }
}
