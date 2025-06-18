<?php

declare(strict_types=1);

namespace App\Models\StatementInterests;

use App\Enums\InterestShareType;
use App\Enums\ShareholderType;
use Cknow\Money\Casts\MoneyIntegerCast;
use Illuminate\Database\Eloquent\Model;

class Shareholder extends Model
{
    protected $table = 'statement_interests_shareholders';

    protected $fillable = [
        'name',
        'type',
        'share',
        'share_type',
        'value',
        'currency',
    ];

    protected function casts(): array
    {
        return [
            'type' => ShareholderType::class,
            'share_type' => InterestShareType::class,
            'value' => MoneyIntegerCast::class . ':currency',
        ];
    }
}
