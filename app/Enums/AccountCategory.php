<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum AccountCategory: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case CURENT = 'curent';
    case DEPOZIT = 'depozit';
    case INVESTITII = 'investitii';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::CURENT => __('enums.account_category.curent'),
            self::DEPOZIT => __('enums.account_category.depozit'),
            self::INVESTITII => __('enums.account_category.investitii'),
        };
    }
}
