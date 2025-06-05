<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum AcquisitionMethod: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case SALE_CONTRACT = 'sale_contract';
    case DONATION = 'donation';
    case EXCHANGE = 'exchange';
    case INHERITANCE = 'inheritance';
    case REESTABLISHMENT_OF_PROPERTY_RIGHTS = 'reestablishment_of_property_rights';
    case COURT_DECISION = 'court_decision';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SALE_CONTRACT => __('enums.acquisition_method.sale_contract'),
            self::DONATION => __('enums.acquisition_method.donation'),
            self::EXCHANGE => __('enums.acquisition_method.exchange'),
            self::INHERITANCE => __('enums.acquisition_method.inheritance'),
            self::REESTABLISHMENT_OF_PROPERTY_RIGHTS => __('enums.acquisition_method.reestablishment_of_property_rights'),
            self::COURT_DECISION => __('enums.acquisition_method.court_decision'),
        };
    }
}
