<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum StatementType: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case NUMIRE = 'numire';
    case ANUAL = 'anual';
    case INCETARE = 'incetare';
    case RECTIFICATIVA = 'rectificativa';
    case SUSPENDARE = 'suspendare';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::NUMIRE => __('enums.statement_type.numire'),
            self::ANUAL => __('enums.statement_type.anual'),
            self::INCETARE => __('enums.statement_type.incetare'),
            self::RECTIFICATIVA => __('enums.statement_type.rectificativa'),
            self::SUSPENDARE => __('enums.statement_type.suspendare'),
        };
    }
}
