<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum BeneficiaryType: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case HOLDER = 'holder';
    case SPOUSE = 'spouse';
    case CHILDREN = 'children';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::HOLDER => __('enums.beneficiary_type.holder'),
            self::SPOUSE => __('enums.beneficiary_type.spouse'),
            self::CHILDREN => __('enums.beneficiary_type.children'),
        };
    }
}
