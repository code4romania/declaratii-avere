<?php

declare(strict_types=1);

namespace App\Livewire\StatementAssets;

use App\Livewire\StatementSection;
use App\Models\StatementAssets\Gift;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;

class Gifts extends StatementSection
{
    public function getTitle(): string
    {
        return '';
    }

    public function getQuery(): Relation
    {
        return $this->statement->gifts();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn () => $this->getQuery())
            ->columns([
                TextColumn::make('name')
                    ->label(__('app.field.income_beneficiary'))
                    ->description(fn (Gift $record) => $record->beneficiary_type->getLabel()),

                TextColumn::make('source')
                    ->label(__('app.field.income_source')),

                TextColumn::make('description')
                    ->label(__('app.field.income_description')),

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
