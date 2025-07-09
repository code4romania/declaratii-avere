<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public function __construct(
        public string $label,
        public int|float|string $value,
        public ?string $icon = null
    ) {
        //
    }

    public function render(): View
    {
        return view('components.card');
    }
}
