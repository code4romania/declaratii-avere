<?php

declare(strict_types=1);

namespace App\Models\StatementAssets;

use Cknow\Money\Casts\MoneyIntegerCast;
use Illuminate\Database\Eloquent\Model;

class Collectible extends Model
{
    protected $table = 'statement_assets_collectibles';

    protected $fillable = [
        'description',
        'year',
        'value',
        'currency',
    ];

    protected function casts(): array
    {
        return [
            'value' => MoneyIntegerCast::class . ':currency',
        ];
    }
}
