<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Enums\ShareType;
use App\Models\StatementAssets;
use App\Models\StatementAssets\Plot;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\View\View;
use Livewire\Component;

class ListStatementAssetPlots extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public StatementAssets $statement;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn () => $this->statement
                    ->plots()
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
                    ->suffix(fn (Plot $record) => $record->area_unit->getLabel())
                    ->numeric()
                    ->alignRight(),

                TextColumn::make('share')
                    ->label(__('app.field.share'))
                    ->suffix(fn (Plot $record) => $record->share_type->is(ShareType::PRECENT) ? '%' : null)
                    ->alignRight(),

                TextColumn::make('acquisitionMethod.name')
                    ->label(__('app.field.acquisition_method')),

                TextColumn::make('owners')
                    ->label(__('app.field.owners'))
                    ->formatStateUsing(fn (Plot $record) => collect($record->owners)->implode(', ')),

            ])
            ->paginated(false);
    }

    public function render(): View
    {
        return view('livewire.list-statement-asset-plots');
    }
}
