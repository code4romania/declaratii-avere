<?php

declare(strict_types=1);

namespace App\Livewire\StatementInterests;

use App\Livewire\StatementSection;
use App\Models\StatementInterests\Shareholder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;

class Shareholders extends StatementSection
{
    public function getTitle(): string
    {
        return __('app.headings.shareholder');
    }

    public function getQuery(): Relation
    {
        return $this->statement->shareholders();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn () => $this->getQuery())
            ->columns([
                TextColumn::make('name')
                    ->label(__('app.field.shareholder_unit')),

                TextColumn::make('type')
                    ->label(__('app.field.shareholder_type')),

                TextColumn::make('share')
                    ->label(__('app.field.share'))
                    ->suffix(fn (Shareholder $record) => $record->share_type->getLabel()),

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
