<?php

declare(strict_types=1);

namespace App\Livewire\StatementAssets;

use App\Livewire\StatementSection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;

class Transfers extends StatementSection
{
    public function getTitle(): string
    {
        return '';
    }

    public function getQuery(): Relation
    {
        return $this->statement->transfers();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn () => $this->getQuery())
            ->columns([
                TextColumn::make('category')
                    ->label(__('app.field.transfer_category')),

                TextColumn::make('date')
                    ->label(__('app.field.transfer_date')),

                TextColumn::make('person')
                    ->label(__('app.field.transfer_person')),

                TextColumn::make('type')
                    ->label(__('app.field.transfer_type')),

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
