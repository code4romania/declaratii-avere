<?php

declare(strict_types=1);

namespace App\Models\StatementAssets;

use App\Enums\AccountCategory;
use Cknow\Money\Casts\MoneyStringCast;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'statement_assets_accounts';

    protected $fillable = [
        'name',
        'category',
        'year',
        'value',
        'currency',
    ];

    protected function casts(): array
    {
        return [
            'category' => AccountCategory::class,
            'year' => 'integer',
            'value' => MoneyStringCast::class . ':currency',
        ];
    }
}
