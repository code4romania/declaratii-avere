<?php

declare(strict_types=1);

namespace App\Models\StatementAssets;

use App\Enums\BuildingCategory;
use App\Models\AcquisitionMethod;
use App\Models\Country;
use App\Models\County;
use App\Models\Locality;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Building extends Model
{
    /** @use HasFactory<\Database\Factories\StatementAssets\BuildingFactory> */
    use HasFactory;

    protected $table = 'statement_assets_buildings';

    protected $fillable = [
        'acquisition_method_id',
        'country_id',
        'county_id',
        'locality_id',
        'foreign_locality',
        'category',
        'acquisition_method',
        'year',
        'area',
        'area_unit',
        'share_type',
        'share',
        'owners',
    ];

    protected function casts(): array
    {
        return [
            'category' => BuildingCategory::class,
            'year' => 'integer',
            'area' => 'float',
            'owners' => 'array',
        ];
    }

    public function acquisitionMethod(): BelongsTo
    {
        return $this->belongsTo(AcquisitionMethod::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }

    public function locality(): BelongsTo
    {
        return $this->belongsTo(Locality::class);
    }
}
