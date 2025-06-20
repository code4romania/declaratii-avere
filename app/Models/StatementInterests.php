<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\HasFile;
use App\Enums\StatementType;
use App\Models\StatementInterests\Contract;
use App\Models\StatementInterests\Manager;
use App\Models\StatementInterests\Party;
use App\Models\StatementInterests\Professional;
use App\Models\StatementInterests\Shareholder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatementInterests extends Model
{
    /** @use HasFactory<\Database\Factories\StatementInterestsFactory> */
    use HasFactory;
    use HasFile;

    public $fillable = [
        'type',
        'statement_date',
        'person_id',
        'position_id',
        'institution_id',
    ];

    protected function casts(): array
    {
        return [
            'type' => StatementType::class,
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

    public function shareholders(): HasMany
    {
        return $this->hasMany(Shareholder::class);
    }

    public function managers(): HasMany
    {
        return $this->hasMany(Manager::class);
    }

    public function professionals(): HasMany
    {
        return $this->hasMany(Professional::class);
    }

    public function parties(): HasMany
    {
        return $this->hasMany(Party::class);
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
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
