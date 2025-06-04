<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\StatementAssets\Plot;
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
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function plots(): HasMany
    {
        return $this->hasMany(Plot::class);
    }
}
