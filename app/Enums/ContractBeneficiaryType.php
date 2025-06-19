<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum ContractBeneficiaryType: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case HOLDER = 'holder';
    case SPOUSE = 'spouse';
    case RELATIVES = 'relatives';
    case ORGANIZATION = 'organization';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::HOLDER => __('enums.contract_beneficiary_type.holder'),
            self::SPOUSE => __('enums.contract_beneficiary_type.spouse'),
            self::RELATIVES => __('enums.contract_beneficiary_type.relatives'),
            self::ORGANIZATION => __('enums.contract_beneficiary_type.organization'),
        };
    }
}
