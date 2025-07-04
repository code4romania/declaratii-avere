<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum BuildingCategory: string implements HasLabel, HasIcon
{
    use Arrayable;
    use Comparable;

    case APARTAMENT = 'apartament';
    case CASA_LOCUIT = 'casa_locuit';
    case CASA_VACANTA = 'casa_vacanta';
    case COMERCIAL = 'comercial';
    case ALTELE = 'altele';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::APARTAMENT => __('enums.building_category.apartament'),
            self::CASA_LOCUIT => __('enums.building_category.casa_locuit'),
            self::CASA_VACANTA => __('enums.building_category.casa_vacanta'),
            self::COMERCIAL => __('enums.building_category.comercial'),
            self::ALTELE => __('enums.building_category.altele'),
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::APARTAMENT => 'heroicon-o-building-office-2',
            self::CASA_LOCUIT => 'heroicon-o-home',
            self::CASA_VACANTA => 'heroicon-o-home-modern',
            self::COMERCIAL => 'heroicon-o-building-storefront',
            self::ALTELE => 'ri-dashboard-line',
        };
    }
}
