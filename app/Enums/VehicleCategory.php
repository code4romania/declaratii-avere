<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum VehicleCategory: string implements HasLabel, HasIcon
{
    use Arrayable;
    use Comparable;

    case AUTOVEHICUL = 'autovehicul';
    case AUTOTURISM = 'autoturism';
    case TRACTOR = 'tractor';
    case AGRICOLA = 'agricola';
    case SALUPA = 'salupa';
    case IAHT = 'iaht';
    case ALTELE = 'altele';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::AUTOVEHICUL => __('enums.vehicle_category.autovehicul'),
            self::AUTOTURISM => __('enums.vehicle_category.autoturism'),
            self::TRACTOR => __('enums.vehicle_category.tractor'),
            self::AGRICOLA => __('enums.vehicle_category.agricola'),
            self::SALUPA => __('enums.vehicle_category.salupa'),
            self::IAHT => __('enums.vehicle_category.iaht'),
            self::ALTELE => __('enums.vehicle_category.altele'),
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::AUTOVEHICUL => 'ri-car-line',
            self::AUTOTURISM => 'ri-car-line',
            self::TRACTOR => 'ri-car-line',
            self::AGRICOLA => 'ri-car-line',
            self::SALUPA => 'ri-sailboat-line',
            self::IAHT => 'ri-sailboat-line',
            self::ALTELE => 'ri-dashboard-line',
        };
    }
}
