<?php

declare(strict_types=1);

namespace App\Concerns;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait CanBeValidated
{
    public function initializeCanBeValidated(): void
    {
        $this->fillable[] = 'validator_id';
    }

    public function validator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'validator_id');
    }

    #[Scope]
    public function whereValidated(Builder $query): Builder
    {
        return $query->whereNotNull('validator_id');
    }
}
