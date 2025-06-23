<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\StatementInterests;
use App\Models\User;

class StatementInterestsPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, StatementInterests $statementInterests): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

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

    public function restore(User $user, StatementInterests $statementInterests): bool
    {
        return $this->delete($user, $statementInterests);
    }

    public function forceDelete(User $user, StatementInterests $statementInterests): bool
    {
        return $this->delete($user, $statementInterests);
    }
}
