<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Schemas;

use App\Models\County;
use App\Models\Locality;
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
                    ->reorderable(false)
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Select::make('country_id')
                                    ->label(__('app.fields.country')),

                                Select::make('county_id')
                                    ->label(__('app.fields.county'))
                                    ->options(County::pluck('name', 'id'))
                                    ->searchable()
                                    ->lazy()
                                    ->required(),

                                Select::make('locality_id')
                                    ->label(__('app.fields.locality'))
                                    ->disabled(fn (Get $get) => blank($get('county_id')))
                                    ->options(fn (Get $get) => Locality::where('county_id', $get('county_id'))->pluck('name', 'id'))
                                    ->searchable()
                                    ->required(),
                            ]),

                        Select::make('category'),

                        TextInput::make('year')
                            ->integer()
                            ->minValue(1900)
                            ->maxValue(date('Y')),

                        TextInput::make('area')
                            ->integer()
                            ->minValue(0),
                    ]),
            ]);
    }
}
