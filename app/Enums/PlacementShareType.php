<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum PlacementShareType: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case TITLURI = 'titluri';
    case PRECENT = 'precent';
    case FRACTION = 'fraction';
    case ALTELE = 'altele';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::TITLURI => __('enums.placement_share_type.titluri'),
            self::PRECENT => __('enums.placement_share_type.precent'),
            self::FRACTION => __('enums.placement_share_type.fraction'),
            self::ALTELE => __('enums.placement_share_type.altele'),
        };
    }
}
