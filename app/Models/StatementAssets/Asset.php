<?php

declare(strict_types=1);

namespace App\Models\StatementAssets;

use Cknow\Money\Casts\MoneyIntegerCast;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'statement_assets_assets';

    protected $fillable = [
        'description',
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
