<?php

declare(strict_types=1);

namespace App\Models\StatementAssets;

use App\Enums\BeneficiaryType;
use App\Enums\IncomeType;
use Cknow\Money\Casts\MoneyIntegerCast;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'statement_assets_incomes';

    protected $fillable = [
        'name',
        'beneficiary_type',
        'type',
        'source',
        'description',
        'value',
        'currency',
    ];

    protected function casts(): array
    {
        return [
            'type' => IncomeType::class,
            'beneficiary_type' => BeneficiaryType::class,
            'value' => MoneyIntegerCast::class . ':currency',
        ];
    }
}
