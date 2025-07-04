<?php

declare(strict_types=1);

namespace App\Livewire\StatementAssets;

use App\Enums\PlacementShareType;
use App\Livewire\StatementSection;
use App\Models\StatementAssets\Placement;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;

class Placements extends StatementSection
{
    public function getTitle(): string
    {
        return __('app.section.financial_placements');
    }

    public function getQuery(): Relation
    {
        return $this->statement->placements();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn () => $this->getQuery())
            ->columns([
                TextColumn::make('name')
                    ->label(__('app.field.placement_name'))
                    ->extraHeaderAttributes(['class' => 'text-left'])
                    ->wrapHeader(),

                TextColumn::make('category')
                    ->label(__('app.field.placement_category')),

                TextColumn::make('share')
                    ->label(__('app.field.share'))
                    ->suffix(fn (Placement $record) => $record->share_type->is(PlacementShareType::PRECENT) ? '%' : null)
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
