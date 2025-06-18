<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum InterestShareType: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case SOCIALE = 'sociale';
    case ACTIUNI = 'actiuni';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SOCIALE => __('enums.interest_share_type.sociale'),
            self::ACTIUNI => __('enums.interest_share_type.actiuni'),
        };
    }
}
