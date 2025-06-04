<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum AcquisitionMethods: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case SALE_CONTRACT = 'sale_contract';
    case DONATION = 'donation';
    case EXCHANGE = 'exchange';
    case INHERITANCE = 'inheritance';
    case  REESTABLISHMENT_OF_PROPERTY_RIGHTS = 'reestablishment_of_property_rights';

    case  COURT_DECISION = 'court_decision';

    public function getLabel(): ?string
    {
        return __('enums.acquisition_methods.' . $this->value);
    }
}
