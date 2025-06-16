<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum TransferCategory: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case APARTAMENT = 'apartament';
    case CASA_LOCUIT = 'casa_locuit';
    case CASA_VACANTA = 'casa_vacanta';
    case COMERCIAL = 'comercial';
    case ALTE_IMOBILE = 'alte_imobile';

    case AGRICOL = 'agricol';
    case FORESTIER = 'forestier';
    case INTRAVILAN = 'intravilan';
    case LUCIUAPA = 'luciuapa';
    case ALTE_TERENURI = 'alte_terenuri';

    case AUTOVEHICUL = 'autovehicul';
    case AUTOTURISM = 'autoturism';
    case TRACTOR = 'tractor';
    case AGRICOLA = 'agricola';
    case SALUPA = 'salupa';
    case IAHT = 'iaht';
    case ALTE_VEHICULE = 'alte_vehicule';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::APARTAMENT => __('enums.building_category.apartament'),
            self::CASA_LOCUIT => __('enums.building_category.casa_locuit'),
            self::CASA_VACANTA => __('enums.building_category.casa_vacanta'),
            self::COMERCIAL => __('enums.building_category.comercial'),
            self::ALTE_IMOBILE => __('enums.building_category.altele'),

            self::AGRICOL => __('enums.plot_category.agricol'),
            self::FORESTIER => __('enums.plot_category.forestier'),
            self::INTRAVILAN => __('enums.plot_category.intravilan'),
            self::LUCIUAPA => __('enums.plot_category.luciuapa'),
            self::ALTE_TERENURI => __('enums.plot_category.altele'),

            self::AUTOVEHICUL => __('enums.vehicle_category.autovehicul'),
            self::AUTOTURISM => __('enums.vehicle_category.autoturism'),
            self::TRACTOR => __('enums.vehicle_category.tractor'),
            self::AGRICOLA => __('enums.vehicle_category.agricola'),
            self::SALUPA => __('enums.vehicle_category.salupa'),
            self::IAHT => __('enums.vehicle_category.iaht'),
            self::ALTE_VEHICULE => __('enums.vehicle_category.altele'),
        };
    }
}
