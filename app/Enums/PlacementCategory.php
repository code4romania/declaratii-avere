<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum PlacementCategory: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case TITLURI = 'titluri';
    case ACTIUNI = 'actiuni';
    case IMPRUMUTURI = 'imprumuturi';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::TITLURI => __('enums.placement_category.titluri'),
            self::ACTIUNI => __('enums.placement_category.actiuni'),
            self::IMPRUMUTURI => __('enums.placement_category.imprumuturi'),
        };
    }
}
