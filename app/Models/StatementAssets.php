<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\StatementAssets\Account;
use App\Models\StatementAssets\Building;
use App\Models\StatementAssets\Collectible;
use App\Models\StatementAssets\Plot;
use App\Models\StatementAssets\Transfer;
use App\Models\StatementAssets\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatementAssets extends Model
{
    /** @use HasFactory<\Database\Factories\StatementAssetsFactory> */
    use HasFactory;

    public $fillable = [
        'type',
        'statement_date',
        'person_id',
        'position_id',
        'institution_id',
    ];

    public static function booted(): void
    {
        static::creating(function (self $model) {
            if (auth()->check()) {
                // Set the author_id to the currently authenticated user's ID
                $model->author_id = auth()->id();
            }
        });
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    public function plots(): HasMany
    {
        return $this->hasMany(Plot::class);
    }

    public function buildings(): HasMany
    {
        return $this->hasMany(Building::class);
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    public function collectibles(): HasMany
    {
        return $this->hasMany(Collectible::class);
    }

    public function transfers(): HasMany
    {
        return $this->hasMany(Transfer::class);
    }

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function validator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'validator_id');
    }
}
