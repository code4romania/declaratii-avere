<?php

declare(strict_types=1);

namespace App\Models\StatementAssets;

use App\Enums\AreaUnitMeasure;
use App\Enums\OwnershipUnitMeasure;
use App\Models\Country;
use App\Models\County;
use App\Models\Locality;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plot extends Model
{
    /** @use HasFactory<\Database\Factories\StatementAssets\PlotFactory> */
    use HasFactory;

    protected $fillable = [
        'country_id',
        'county_id',
        'locality_id',
        'category',
        'acquisition_method',
        'year',
        'area',
        'ownership_percentage',
    ];

    protected $casts = [
        'year' => 'integer',
        'area' => 'float',
        'ownership_percentage' => 'float',
    ];

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

    protected function setAreaAttribute(float|array $value)
    {
        $dbValue = $value;
        if (\is_array($value)) {
            $unit = AreaUnitMeasure::from($value['unit']);
            $dbValue = $value['value'] * $unit->getMultiple();
        }
        $this->attributes['area'] = $dbValue;
    }

    protected function setOwnershipPercentageAttribute(array|float $value)
    {
        $dbValue = $value;
        if (\is_array($value)) {
            $type = OwnershipUnitMeasure::from($value['unit']);
            $dbValue = $value['value'];
            if ($type === OwnershipUnitMeasure::FRACTION) {
                [$numerator, $denominator] = explode('/', $value['value']);
                if ($denominator == 0) {
                    throw new \InvalidArgumentException('Denominator cannot be zero.');
                }
                $dbValue = ($numerator / $denominator) * 100; // Convert fraction to percentage
            }
        }
        $this->attributes['ownership_percentage'] = $dbValue;
    }
}
