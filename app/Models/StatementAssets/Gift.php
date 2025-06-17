<?php

declare(strict_types=1);

namespace App\Models\StatementAssets;

use App\Enums\BeneficiaryType;
use Cknow\Money\Casts\MoneyIntegerCast;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $table = 'statement_assets_gifts';

    protected $fillable = [
        'name',
        'beneficiary_type',
        'source',
        'description',
        'value',
        'currency',
    ];

    protected function casts(): array
    {
        return [
            'beneficiary_type' => BeneficiaryType::class,
            'value' => MoneyIntegerCast::class . ':currency',
        ];
    }
}
