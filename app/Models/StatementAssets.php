<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\CanBeValidated;
use App\Concerns\HasFile;
use App\Enums\StatementType;
use App\Models\StatementAssets\Account;
use App\Models\StatementAssets\Asset;
use App\Models\StatementAssets\Building;
use App\Models\StatementAssets\Collectible;
use App\Models\StatementAssets\Debt;
use App\Models\StatementAssets\Gift;
use App\Models\StatementAssets\Income;
use App\Models\StatementAssets\Placement;
use App\Models\StatementAssets\Plot;
use App\Models\StatementAssets\Transfer;
use App\Models\StatementAssets\Vehicle;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatementAssets extends Model
{
    use CanBeValidated;
    /** @use HasFactory<\Database\Factories\StatementAssetsFactory> */
    use HasFactory;
    use HasFile;

    public $fillable = [
        'type',
        'statement_date',
        'party',
        'person_id',
        'position_id',
        'institution_id',
        'filename',
        'author_id',
    ];

    protected function casts(): array
    {
        return [
            'type' => StatementType::class,
            'statement_date' => 'date',
        ];
    }

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

    public function placements(): HasMany
    {
        return $this->hasMany(Placement::class);
    }

    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class);
    }

    public function debts(): HasMany
    {
        return $this->hasMany(Debt::class);
    }

    public function gifts(): HasMany
    {
        return $this->hasMany(Gift::class);
    }

    public function incomes(): HasMany
    {
        return $this->hasMany(Income::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function url(): Attribute
    {
        return Attribute::make(fn () => route('front.profile.assets', ['person' => $this->person, 'statement' => $this]));
    }
}
