<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Schemas;

use App\Enums\AcquisitionMethods;
use App\Enums\AreaUnitMeasure;
use App\Enums\OwnershipUnitMeasure;
use App\Enums\PlotCategory;
use App\Models\Country;
use App\Models\County;
use App\Models\Locality;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;

class RealEstateForm
{
    public static function getSection(): Section
    {
        return Section::make('I. Bunuri imobile')
            ->collapsible()
            ->schema([
                Repeater::make('plots')
                    ->relationship('plots')
                    ->reorderable(false)
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Select::make('country_id')
                                    ->relationship('countries', 'name')
                                    ->live()
                                    ->options(Country::all()->pluck('name', 'id'))
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->required()
                                            ->label(__('app.field.name')),
                                    ])
                                    ->label(__('app.field.country')),

                                Select::make('county_id')
                                    ->label(__('app.field.county'))
                                    ->live()
                                    ->disabled(fn (Get $get) => blank($get('country_id')))
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->required()
                                            ->label(__('app.field.name')),
                                        Select::make('country_id')
                                            ->label(__('app.field.country'))
                                            ->relationship('country', 'name'),
                                    ])
                                    ->options(fn (Get $get) => County::where('country_id', $get('country_id'))->pluck('name', 'id'))
                                    ->searchable()
                                    ->lazy()
                                    ->required(),

                                Select::make('locality_id')
                                    ->label(__('app.field.locality'))
                                    ->disabled(fn (Get $get) => blank($get('county_id')))
                                    ->options(fn (Get $get) => Locality::where('county_id', $get('county_id'))->pluck('name', 'id'))
                                    ->searchable()
                                    ->required(),
                            ]),

                        Select::make('acquisition_method')
                            ->label(__('app.field.acquisition_method'))
                            ->required()
                            ->options(AcquisitionMethods::options()),
                        Select::make('category')
                            ->required()
                            ->label(__('app.field.category'))
                            ->options(PlotCategory::options()),

                        TextInput::make('year')
                            ->label(__('app.field.year_of_acquisition'))
                            ->integer()
                            ->required()
                            ->minValue(1900)
                            ->maxValue(date('Y')),

                        Fieldset::make(__('app.field.area'))->columns(2)
                            ->statePath('area')
                            ->schema([
                                Select::make('unit')
                                    ->options(AreaUnitMeasure::options())
                                    ->label(__('app.field.area_unit')),

                                TextInput::make('value')
                                    ->integer()
                                    ->minValue(0)
                                    ->label(__('app.field.value')),
                            ]),
                        Fieldset::make(__('app.field.ownership_percentage'))
                            ->columns(2)
                            ->statePath('ownership_percentage')
                            ->schema([
                                Select::make('unit')
                                    ->live()
                                    ->label(__('app.field.ownership_unit_measure'))
                                    ->options(OwnershipUnitMeasure::options())
                                    ->default(OwnershipUnitMeasure::PRECENT->value),
                                TextInput::make('value')
                                    ->placeholder(fn (Get $get) => $get('unit') === OwnershipUnitMeasure::FRACTION->value ? '1/2' : '100')
                                    ->label(__('app.field.ownership_percentage')),

                            ]),
                    ]),
            ]);
    }
}
