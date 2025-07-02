<?php

declare(strict_types=1);

namespace App\Livewire\StatementAssets;

use App\Livewire\StatementSection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;

class Collectibles extends StatementSection
{
    public function getTitle(): string
    {
        return __('app.field.collectibles');
    }

    public function getQuery(): Relation
    {
        return $this->statement->collectibles();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn () => $this->getQuery())
            ->columns([
                TextColumn::make('description')
                    ->label(__('app.field.description')),

                TextColumn::make('year')
                    ->label(__('app.field.year_of_acquisition'))
                    ->alignRight(),

                TextColumn::make('value')
                    ->label(__('app.field.value'))
                    ->alignRight(),
            ])
            ->paginated(false);
    }

    public function getStats(): Collection
    {
        return collect();
    }
}
