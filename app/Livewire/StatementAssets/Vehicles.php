<?php

declare(strict_types=1);

namespace App\Livewire\StatementAssets;

use App\Livewire\StatementSection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Vehicles extends StatementSection
{
    public function getTitle(): string
    {
        return __('app.section.vehicles');
    }

    public function getQuery(): Relation
    {
        return $this->statement->vehicles();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn () => $this->getQuery()
                    ->with('acquisitionMethod')
            )
            ->columns([
                TextColumn::make('category')
                    ->label(__('app.field.category'))
                    ->icon(false),

                TextColumn::make('brand')
                    ->label(__('app.field.brand')),

                TextColumn::make('quantity')
                    ->label(__('app.field.quantity'))
                    ->numeric()
                    ->alignRight(),

                TextColumn::make('year')
                    ->label(__('app.field.year_of_acquisition'))
                    ->alignRight(),

                TextColumn::make('acquisitionMethod.name')
                    ->label(__('app.field.acquisition_method')),

            ])
            ->paginated(false);
    }

    public function getStats(): Collection
    {
        return $this->getQuery()
            ->groupBy('category')
            ->select('category', DB::raw('count(*) as total'))
            ->get();
    }
}
