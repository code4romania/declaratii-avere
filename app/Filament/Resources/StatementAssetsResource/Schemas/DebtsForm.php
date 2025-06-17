<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Schemas;

use App\Forms\Components\MoneyInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;

class DebtsForm
{
    public static function getSection(): Section
    {
        return Section::make('V. Datorii')
            ->collapsible()
            ->schema([
                Repeater::make('debts')
                    ->relationship('debts')
                    ->label(__('app.section.financial_debts'))
                    ->reorderable(false)
                    ->defaultItems(0)
                    ->schema([
                        TextInput::make('creditor')
                            ->label(__('app.field.creditor'))
                            ->required()
                            ->maxLength(255),

                        TextInput::make('year_incurred')
                            ->label(__('app.field.year_incurred'))
                            ->integer()
                            ->required()
                            ->lazy()
                            ->minValue(1900)
                            ->maxValue(date('Y')),

                        TextInput::make('year_due')
                            ->label(__('app.field.year_due'))
                            ->integer()
                            ->minValue(1900)
                            ->maxValue(date('Y'))
                            ->afterOrEqual('year_incurred'),

                        MoneyInput::make('value')
                            ->label(__('app.field.value'))
                            ->required(),
                    ]),
            ]);
    }
}
