<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum ShareholderType: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case ACTIONAR = 'actionar';
    case ASOCIAT = 'asociat';
    case MEMBRU = 'membru';
    case ALTELE = 'altele';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ACTIONAR => __('enums.shareholder_type.actionar'),
            self::ASOCIAT => __('enums.shareholder_type.asociat'),
            self::MEMBRU => __('enums.shareholder_type.membru'),
            self::ALTELE => __('enums.shareholder_type.altele'),
        };
    }
}
