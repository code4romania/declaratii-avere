<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Country extends Model
{
    protected $fillable = [
        'name',
    ];

    public function counties(): HasMany
    {
        return $this->hasMany(County::class);
    }

    public function localities(): HasManyThrough
    {
        return $this->hasManyThrough(Locality::class, County::class);
    }
}
