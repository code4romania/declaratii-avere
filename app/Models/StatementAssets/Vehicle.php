<?php

declare(strict_types=1);

namespace App\Models\StatementAssets;

use App\Enums\VehicleCategory;
use App\Models\AcquisitionMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    protected $table = 'statement_assets_vehicles';

    protected $fillable = [
        'acquisition_method_id',
        'category',
        'brand',
        'year',
        'quantity',
    ];

    protected function casts(): array
    {
        return [
            'category' => VehicleCategory::class,
            'year' => 'integer',
            'quantity' => 'integer',
        ];
    }

    public function acquisitionMethod(): BelongsTo
    {
        return $this->belongsTo(AcquisitionMethod::class);
    }
}
