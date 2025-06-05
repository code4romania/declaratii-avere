<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum DeclarationType: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case ASSETS = 'assets';
    case INTERESTS = 'interests';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ASSETS => __('enums.declaration_type.assets'),
            self::INTERESTS => __('enums.declaration_type.interests'),
        };
    }
}
