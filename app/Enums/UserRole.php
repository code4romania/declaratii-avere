<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum UserRole: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case ADMIN = 'admin';
    case VALIDATOR = 'validator';
    case CONTRIBUTOR = 'contributor';
    case VIEWER = 'viewer';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ADMIN => __('app.user.role.admin'),
            self::VALIDATOR => __('app.user.role.validator'),
            self::CONTRIBUTOR => __('app.user.role.contributor'),
            self::VIEWER => __('app.user.role.viewer'),
        };
    }
}
