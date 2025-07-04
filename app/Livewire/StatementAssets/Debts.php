<?php

declare(strict_types=1);

namespace App\Livewire\StatementAssets;

use App\Livewire\StatementSection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;

class Debts extends StatementSection
{
    public function getTitle(): string
    {
        return __('app.section.financial_debts');
    }

    public function getQuery(): Relation
    {
        return $this->statement->debts();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn () => $this->getQuery())
            ->columns([
                TextColumn::make('creditor')
                    ->label(__('app.field.creditor')),

                TextColumn::make('year_incurred')
                    ->label(__('app.field.year_incurred')),

                TextColumn::make('year_due')
                    ->label(__('app.field.year_due')),

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
