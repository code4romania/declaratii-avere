<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Schemas;

use App\Enums\AcquisitionMethod;
use App\Enums\AreaUnitMeasure;
use App\Enums\OwnershipUnitMeasure;
use App\Enums\PlotCategory;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Database\Eloquent\Builder;

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
                                    ->relationship('country', 'name')
                                    ->label(__('app.field.country'))
                                    ->default('RO')
                                    ->afterStateUpdated(function (Set $set, string $state) {
                                        if ($state === 'RO') {
                                            $set('foreign_locality', null);
                                        } else {
                                            $set('county_id', null);
                                            $set('locality_id', null);
                                        }
                                    })
                                    ->live(),

                                Grid::make()
                                    ->columnSpan(2)
                                    ->visible(fn (Get $get) => $get('country_id') === 'RO')
                                    ->schema([
                                        Select::make('county_id')
                                            ->label(__('app.field.county'))
                                            ->relationship('county', 'name')
                                            ->searchable()
                                            ->live()
                                            ->preload()
                                            ->required(),

                                        Select::make('locality_id')
                                            ->label(__('app.field.locality'))
                                            ->relationship(
                                                'locality',
                                                'name',
                                                fn (Builder $query, Get $get) => $query->where('county_id', $get('county_id'))
                                            )
                                            ->disabled(fn (Get $get) => blank($get('county_id')))
                                            ->searchable()
                                            ->preload()
                                            ->required(),
                                    ]),

                                TextInput::make('foreign_locality')
                                    ->label(__('app.field.foreign_locality'))
                                    ->visible(fn (Get $get) => $get('country_id') !== 'RO')
                                    ->required()
                                    ->columnSpan(2),

                            ]),

                        Select::make('acquisition_method')
                            ->label(__('app.field.acquisition_method'))
                            ->options(AcquisitionMethod::options())
                            ->required(),

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

                        Fieldset::make(__('app.field.area'))
                            ->columns(2)
                            ->schema([
                                Select::make('area_unit')
                                    ->options(AreaUnitMeasure::options())
                                    ->label(__('app.field.area_unit')),

                                TextInput::make('area')
                                    ->integer()
                                    ->minValue(0)
                                    ->label(__('app.field.value')),
                            ]),

                        Fieldset::make(__('app.field.ownership_percentage'))
                            ->columns(2)
                            ->statePath('ownership_percentage')
                            ->schema([
                                Select::make('unit')
                                    ->lazy()
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
