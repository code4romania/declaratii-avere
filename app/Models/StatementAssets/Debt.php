<?php

declare(strict_types=1);

namespace App\Models\StatementAssets;

use Cknow\Money\Casts\MoneyIntegerCast;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $table = 'statement_assets_debts';

    protected $fillable = [
        'creditor',
        'year_incurred',
        'year_due',
        'value',
        'currency',
    ];

    protected function casts(): array
    {
        return [

            'year_incurred' => 'integer',
            'year_due' => 'integer',
            'value' => MoneyIntegerCast::class . ':currency',
        ];
    }
}
