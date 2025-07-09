<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Schemas;

use App\Enums\TransferCategory;
use App\Forms\Components\MoneyInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class TransfersForm
{
    public static function getSection(): Section
    {
        return Section::make(__('app.headings.transfers'))
            ->collapsible()
            ->schema([
                Repeater::make('transfers')
                    ->relationship('transfers')
                    ->hiddenLabel()
                    ->reorderable(false)
                    ->defaultItems(0)
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
                    ]),
            ]);
    }
}
