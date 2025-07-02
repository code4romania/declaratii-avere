<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\StatementAssets;
use App\Models\StatementInterests;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

abstract class StatementSection extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public StatementAssets|StatementInterests $statement;

    abstract public function getTitle(): string;

    abstract public function getStats(): Collection;

    public function render(): View
    {
        return view('livewire.statement-section');
    }
}
