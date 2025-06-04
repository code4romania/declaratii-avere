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
    //https://www.birouri-cadastru.ro/articol-clasificarea-terenurilor

    case TDA = 'tda';
    case TDF = 'tdf';

    case TDH = 'tdh';

    case TDI = 'tdi';

    case TDS = 'tds';

    public function getLabel(): ?string
    {
        return __('enums.plot_category.' . $this->value);
    }
}
