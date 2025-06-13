<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum IncomeType: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case SALARII = 'salarii';
    case INDEPENDENT = 'independent';
    case CEDARE = 'cedare';
    case INVESTITII = 'investitii';
    case PENSII = 'pensii';
    case AGRICOLE = 'agricole';
    case NOROC = 'noroc';
    case ALTE = 'alte';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SALARII => __('enums.income_type.salarii'),
            self::INDEPENDENT => __('enums.income_type.independent'),
            self::CEDARE => __('enums.income_type.cedare'),
            self::INVESTITII => __('enums.income_type.investitii'),
            self::PENSII => __('enums.income_type.pensii'),
            self::AGRICOLE => __('enums.income_type.agricole'),
            self::NOROC => __('enums.income_type.noroc'),
            self::ALTE => __('enums.income_type.alte'),
        };
    }
}
