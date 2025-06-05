<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum ShareType: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case PRECENT = 'precent';
    case FRACTION = 'fraction';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PRECENT => __('enums.share_type.precent'),
            self::FRACTION => __('enums.share_type.fraction'),
        };
    }
}
