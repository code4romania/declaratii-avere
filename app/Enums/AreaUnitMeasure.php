<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum AreaUnitMeasure: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case SQUARE_METER = 'm2';
    case ARES = 'ar';
    case HECTARES = 'ha';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SQUARE_METER => __('enums.area_unit_measure.m2'),
            self::ARES => __('enums.area_unit_measure.ar'),
            self::HECTARES => __('enums.area_unit_measure.ha'),
        };
    }

    public function getMultiple(): float
    {
        return match ($this) {
            self::SQUARE_METER => 1.0,
            self::ARES => 100.0,
            self::HECTARES => 10000.0,
        };
    }
}
