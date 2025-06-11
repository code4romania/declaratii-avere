<?php

declare(strict_types=1);

namespace App\Models\StatementAssets;

use App\Enums\TransferCategory;
use Cknow\Money\Casts\MoneyStringCast;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $table = 'statement_assets_transfers';

    protected $fillable = [
        'category',
        'date',
        'person',
        'type',
        'value',
        'currency',
    ];

    protected function casts(): array
    {
        return [
            'category' => TransferCategory::class,
            'date' => 'date',
            'value' => MoneyStringCast::class . ':currency',
        ];
    }
}
