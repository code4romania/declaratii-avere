<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Schemas;

use App\Enums\VehicleCategory;
use App\Forms\Components\MoneyInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class MovableGoodsForm
{
    public static function getSection(): Section
    {
        return Section::make(__('app.headings.movable'))
            ->collapsible()
            ->schema([
                static::getVehiclesRepeater(),
                static::getCollectiblesRepeater(),
            ]);
    }

    private static function getVehiclesRepeater(): Repeater
    {
        return Repeater::make('vehicles')
            ->relationship('vehicles')
            ->label(__('app.field.vehicles'))
            ->reorderable(false)
            ->defaultItems(0)
            ->schema([
                Select::make('category')
                    ->required()
                    ->label(__('app.field.category'))
                    ->options(VehicleCategory::options()),

                TextInput::make('brand')
                    ->label(__('app.field.brand'))
                    ->maxLength(255)
                    ->required(),

                TextInput::make('quantity')
                    ->label(__('app.field.quantity'))
                    ->integer()
                    ->minValue(1)
                    ->required(),

                TextInput::make('year')
                    ->label(__('app.field.make_year'))
                    ->integer()
                    ->required()
                    ->minValue(1900)
                    ->maxValue(date('Y')),

                Select::make('acquisition_method_id')
                    ->label(__('app.field.acquisition_method'))
                    ->relationship('acquisitionMethod', 'name')
                    ->required(),
            ]);
    }

    private static function getCollectiblesRepeater(): Repeater
    {
        return Repeater::make('collectibles')
            ->relationship('collectibles')
            ->label(__('app.section.collectibles'))
            ->reorderable(false)
            ->defaultItems(0)
            ->schema([
                TextInput::make('description')
                    ->label(__('app.field.short_description'))
                    ->maxLength(255)
                    ->required(),

                TextInput::make('year')
                    ->label(__('app.field.year_of_acquisition'))
                    ->maxLength(255)
                    ->required(),

                MoneyInput::make('value')
                    ->label(__('app.field.value'))
                    ->required(),

            ]);
    }
}
