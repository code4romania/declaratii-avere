<?php

declare(strict_types=1);

namespace App\Livewire\StatementAssets;

use App\Enums\ShareType;
use App\Livewire\StatementSection;
use App\Models\StatementAssets\Building;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Buildings extends StatementSection
{
    public function getTitle(): string
    {
        return __('app.field.buildings');
    }

    public function getQuery(): Relation
    {
        return $this->statement->buildings();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn () => $this->getQuery()
                    ->with(['country', 'county', 'locality', 'acquisitionMethod'])
            )
            ->columns([
                TextColumn::make('location')
                    ->label(__('app.field.location'))
                    ->icon(false),

                TextColumn::make('category')
                    ->label(__('app.field.category'))
                    ->icon(false),

                TextColumn::make('year')
                    ->label(__('app.field.year_of_acquisition'))

                    ->alignRight(),

                TextColumn::make('area')
                    ->label(__('app.field.area'))
                    ->suffix(fn (Building $record) => $record->area_unit->getLabel())
                    ->numeric()
                    ->alignRight(),

                TextColumn::make('share')
                    ->label(__('app.field.share'))
                    ->suffix(fn (Building $record) => $record->share_type->is(ShareType::PRECENT) ? '%' : null)
                    ->alignRight(),

                TextColumn::make('acquisitionMethod.name')
                    ->label(__('app.field.acquisition_method')),

                TextColumn::make('owners')
                    ->label(__('app.field.owners'))
                    ->formatStateUsing(fn (Building $record) => collect($record->owners)->implode(', ')),

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
