<?php

declare(strict_types=1);

namespace App\Livewire\StatementInterests;

use App\Livewire\StatementSection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;

class Parties extends StatementSection
{
    public function getTitle(): string
    {
        return __('app.headings.party');
    }

    public function getQuery(): Relation
    {
        return $this->statement->parties();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn () => $this->getQuery())
            ->columns([
                TextColumn::make('title')
                    ->label(__('app.field.title')),
            ])
            ->paginated(false);
    }

    public function getStats(): Collection
    {
        return collect();
    }
}
