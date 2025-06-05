<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasLabel;

enum PlotCategory: string implements HasLabel
{
    use Arrayable;
    use Comparable;

    case AGRICOL = 'agricol';
    case FORESTIER = 'forestier';
    case INTRAVILAN = 'intravilan';
    case LUCIUAPA = 'luciuapa';
    case ALTELE = 'altele';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::AGRICOL => __('enums.plot_category.agricol'),
            self::FORESTIER => __('enums.plot_category.forestier'),
            self::INTRAVILAN => __('enums.plot_category.intravilan'),
            self::LUCIUAPA => __('enums.plot_category.luciuapa'),
            self::ALTELE => __('enums.plot_category.altele'),
        };
    }
}
