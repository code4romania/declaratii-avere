<?php

declare(strict_types=1);

namespace App\Enums;

use App\Concerns\Enums\Arrayable;
use App\Concerns\Enums\Comparable;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PlotCategory: string implements HasLabel, HasIcon
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

    public function getIcon(): ?string
    {
        return match ($this) {
            self::AGRICOL => 'lucide-land-plot',
            self::FORESTIER => 'lucide-trees',
            self::INTRAVILAN => 'lucide-land-plot',
            self::LUCIUAPA => 'lucide-square-dashed-mouse-pointer',
            self::ALTELE => 'ri-dashboard-line',
        };
    }
}
