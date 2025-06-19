<?php

declare(strict_types=1);

namespace App\Models\StatementInterests;

use App\Enums\ContractBeneficiaryType;
use Cknow\Money\Casts\MoneyIntegerCast;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'statement_interests_contracts';

    protected $fillable = [
        'name',
        'beneficiary_type',
        'institution',
        'procedure',
        'type',
        'date',
        'duration',
        'value',
        'currency',
    ];

    protected function casts(): array
    {
        return [
            'beneficiary_type' => ContractBeneficiaryType::class,
            'date' => 'date',
            'value' => MoneyIntegerCast::class . ':currency',
        ];
    }
}
