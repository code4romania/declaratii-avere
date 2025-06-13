<?php

declare(strict_types=1);

namespace App\Models\StatementAssets;

use App\Enums\PlacementCategory;
use App\Enums\PlacementShareType;
use Cknow\Money\Casts\MoneyIntegerCast;
use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    protected $table = 'statement_assets_placements';

    protected $fillable = [
        'name',
        'category',
        'share_type',
        'share',
        'value',
        'currency',
    ];

    protected function casts(): array
    {
        return [
            'category' => PlacementCategory::class,
            'year' => 'integer',
            'share_type' => PlacementShareType::class,
            'value' => MoneyIntegerCast::class . ':currency',
        ];
    }
}
