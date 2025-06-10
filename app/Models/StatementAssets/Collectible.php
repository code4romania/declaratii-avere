<?php

declare(strict_types=1);

namespace App\Models\StatementAssets;

use Illuminate\Database\Eloquent\Model;
use Pelmered\FilamentMoneyField\Casts\CurrencyCast;
use Pelmered\FilamentMoneyField\Casts\MoneyCast;

class Collectible extends Model
{
    //
    protected $table = 'statement_assets_collectibles';

    protected $fillable = [
        'description',
        'year',
        'value',
        'value_currency',
    ];

    protected function casts(): array
    {
        return [
            'value' => MoneyCast::class,
            'value_currency' => CurrencyCast::class,
        ];
    }
}
