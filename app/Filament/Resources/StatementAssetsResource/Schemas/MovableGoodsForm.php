<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Schemas;

use App\Enums\TransferCategory;
use App\Enums\VehicleCategory;
use App\Forms\Components\MoneyInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class MovableGoodsForm
{
    public static function getSection(): Section
    {
        return Section::make('II. Bunuri mobile')
            ->collapsible()
            ->schema([
                static::getVehiclesRepeater(),
                static::getCollectiblesRepeater(),
                static::getTransfersRepeater(),
            ]);
    }

    private static function getVehiclesRepeater(): Repeater
    {
        return Repeater::make('vehicles')
            ->relationship('vehicles')
            ->label(__('app.field.vehicles'))
            ->reorderable(false)
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

    private static function getTransfersRepeater(): Repeater
    {
        return Repeater::make('transfers')
            ->relationship('transfers')
            ->label(__('app.section.transfers'))
            ->reorderable(false)
            ->schema([
                Select::make('category')
                    ->label(__('app.field.transfer_category'))
                    ->options(TransferCategory::options())
                    ->required(),

                DatePicker::make('date')
                    ->label(__('app.field.transfer_date'))
                    ->maxDate(today())
                    ->required(),

                TextInput::make('person')
                    ->label(__('app.field.transfer_person'))
                    ->maxLength(255)
                    ->required(),

                TextInput::make('type')
                    ->label(__('app.field.transfer_type'))
                    ->maxLength(255)
                    ->required(),

                MoneyInput::make('value')
                    ->label(__('app.field.value'))
                    ->required(),
            ]);
    }
}
