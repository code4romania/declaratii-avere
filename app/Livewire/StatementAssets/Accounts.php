<?php

declare(strict_types=1);

namespace App\Livewire\StatementAssets;

use App\Livewire\StatementSection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;

class Accounts extends StatementSection
{
    public function getTitle(): string
    {
        return __('app.section.financial_accounts');
    }

    public function getQuery(): Relation
    {
        return $this->statement->accounts();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn () => $this->getQuery())
            ->columns([
                TextColumn::make('name')
                    ->label(__('app.field.account_institution_name')),

                TextColumn::make('category')
                    ->label(__('app.field.type')),

                TextColumn::make('year')
                    ->label(__('app.field.account_year')),

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
