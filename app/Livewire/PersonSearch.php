<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\County;
use App\Models\Institution;
use App\Models\Locality;
use App\Models\Person;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Laravel\Scout\Builder as ScoutBuilder;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PersonSearch extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                TextInput::make('query')
                    ->prefixIcon('heroicon-o-magnifying-glass')
                    ->placeholder(__('app.search_placeholder'))
                    ->hiddenLabel()
                    ->live(debounce: 500),

                Grid::make()
                    ->columns(3)
                    ->schema([
                        Select::make('institution_id')
                            ->label(__('app.field.institution'))
                            ->placeholder(__('app.field.institution'))
                            ->options(
                                Institution::query()
                                    ->take(50)
                                    ->pluck('name', 'id')
                            )
                            ->getSearchResultsUsing(
                                fn (string $search) => Institution::search($search)
                                    ->get()
                                    ->pluck('name', 'id')
                            )
                            ->live()
                            ->searchable(),

                        Select::make('county_id')
                            ->label(__('app.field.county'))
                            ->placeholder(__('app.field.county'))
                            ->options(County::pluck('name', 'id'))
                            ->searchable()
                            ->live()
                            ->preload(),

                        Select::make('locality_id')
                            ->label(__('app.field.locality'))
                            ->placeholder(__('app.field.locality'))
                            ->getSearchResultsUsing(function (string $search, Get $get) {
                                $countyId = (int) $get('county_id');

                                if (! $countyId) {
                                    return [];
                                }

                                return Locality::query()
                                    ->where('county_id', $countyId)
                                    ->search($search)
                                    ->limit(50)
                                    ->get()
                                    ->pluck('name', 'id');
                            })
                            ->disabled(fn (Get $get) => blank($get('county_id')))
                            ->searchable()
                            ->preload(),
                    ]),
            ]);
    }

    #[Computed]
    public function query(): ?string
    {
        $query = Str::of(data_get($this->form->getState(), 'query'))
            ->trim()
            ->value();

        if ($query < 3) {
            return null;
        }

        return $query;
    }

    #[Computed]
    public function people(): Collection
    {
        $query = $this->query;

        if (blank($query)) {
            return collect();
        }

        return Person::search($query)
            ->when(
                data_get($this->form->getState(), 'institution_id'),
                fn (ScoutBuilder $query, int $institutionId) => $query->whereIn('institution_ids', [$institutionId])
            )
            ->query(fn (Builder $query) => $query->with(['position', 'institution']))
            ->get();
    }

    public function render(): View
    {
        return view('livewire.person-search');
    }
}
