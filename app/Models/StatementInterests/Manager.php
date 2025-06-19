<?php

declare(strict_types=1);

namespace App\Models\StatementInterests;

use App\Enums\ShareholderType;
use Cknow\Money\Casts\MoneyIntegerCast;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'statement_interests_managers';

    protected $fillable = [
        'name',
        'type',
        'value',
        'currency',
    ];

    protected function casts(): array
    {
        return [
            'type' => ShareholderType::class,
            'value' => MoneyIntegerCast::class . ':currency',
        ];
    }
}
