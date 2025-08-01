<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementInterestsResource\Schemas;

use App\Enums\ShareholderType;
use App\Forms\Components\MoneyInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class ManagerForm
{
    public static function getSection(): Section
    {
        return Section::make(__('app.headings.manager'))
            ->collapsible()
            ->schema([

                Repeater::make('managers')
                    ->relationship('managers')
                    ->hiddenLabel()
                    ->reorderable(false)
                    ->defaultItems(0)
                    ->schema([
                        TextInput::make('name')
                            ->label(__('app.field.shareholder_unit'))
                            ->required()
                            ->maxLength(255),

                        Select::make('type')
                            ->label(__('app.field.shareholder_type'))
                            ->options(ShareholderType::options())
                            ->enum(ShareholderType::class)
                            ->required(),

                        MoneyInput::make('value')
                            ->label(__('app.field.value'))
                            ->required(),
                    ]),

            ]);
    }
}
