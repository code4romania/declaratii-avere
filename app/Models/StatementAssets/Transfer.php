<?php

declare(strict_types=1);

namespace App\Models\StatementAssets;

use App\Enums\TransferCategory;
use Illuminate\Database\Eloquent\Model;
use Pelmered\FilamentMoneyField\Casts\CurrencyCast;
use Pelmered\FilamentMoneyField\Casts\MoneyCast;

class Transfer extends Model
{
    protected $table = 'statement_assets_transfers';

    protected $fillable = [
        'category',
        'date',
        'person',
        'type',
        'value',
        'value_currency',
    ];

    protected function casts(): array
    {
        return [
            'category' => TransferCategory::class,
            'date' => 'date',
            'value' => MoneyCast::class,
            'value_currency' => CurrencyCast::class,
        ];
    }
}
