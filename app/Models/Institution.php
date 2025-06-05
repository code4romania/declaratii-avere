<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Institution extends Model
{
    /** @use HasFactory<\Database\Factories\InstitutionFactory> */
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'name',
    ];

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }
}
