<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    /** @use HasFactory<\Database\Factories\PersonFactory> */
    use HasFactory;
    use HasSlug;

    public $fillable = [
        'name',
    ];

    public string $slugFieldSource = 'name';

    public function statementAssets(): HasMany
    {
        return $this->hasMany(StatementAssets::class);
    }

    public function statementInterests(): HasMany
    {
        return $this->hasMany(StatementInterests::class);
    }
}
