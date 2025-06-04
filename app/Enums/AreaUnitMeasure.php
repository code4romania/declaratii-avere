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
    case ACRES = 'ar';
    case HECTARES = 'ha';

    public function getLabel(): ?string
    {
        return __('enums.area_unit_measure.' . $this->value);
    }

    public function getMultiple(): float
    {
        return match ($this) {
            self::SQUARE_METER => 1.0,
            self::ACRES => 100.0,
            self::HECTARES => 10000.0,
        };
    }
}
