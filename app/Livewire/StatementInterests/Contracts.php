<?php

declare(strict_types=1);

namespace App\Livewire\StatementInterests;

use App\Livewire\StatementSection;
use App\Models\StatementInterests\Contract;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;

class Contracts extends StatementSection
{
    public function getTitle(): string
    {
        return __('app.headings.contract');
    }

    public function getQuery(): Relation
    {
        return $this->statement->contracts();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn () => $this->getQuery())
            ->columns([
                TextColumn::make('name')
                    ->label(__('app.field.contract_beneficiary'))
                    ->description(fn (Contract $record) => $record->beneficiary_type->getLabel()),

                TextColumn::make('institution')
                    ->label(__('app.field.contract_institution')),

                TextColumn::make('procedure')
                    ->label(__('app.field.contract_procedure')),

                TextColumn::make('type')
                    ->label(__('app.field.contract_type')),

                TextColumn::make('date')
                    ->label(__('app.field.contract_date')),

                TextColumn::make('duration')
                    ->label(__('app.field.duration')),

                TextColumn::make('value')
                    ->label(__('app.field.contract_value'))
                    ->alignRight(),
            ])
            ->paginated(false);
    }

    public function getStats(): Collection
    {
        return collect();
    }
}
