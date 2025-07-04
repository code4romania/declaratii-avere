<?php

declare(strict_types=1);

namespace App\Livewire\Profile;

use App\Enums\DeclarationType;
use Illuminate\View\View;
use Livewire\Component;

class SelectStatement extends Component
{
    public DeclarationType $type;

    public function render(): View
    {
        return view('livewire.profile.select-statement');
    }
}
