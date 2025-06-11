<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Schemas;

use App\Enums\AccountCategory;
use App\Forms\Components\MoneyInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class FinancialAssetsForm
{
    public static function getSection(): Section
    {
        return Section::make('IV. Active financiare')
            ->schema([
                Repeater::make('accounts')
                    ->relationship('accounts')
                    ->label(__('app.section.financial_accounts'))
                    ->reorderable(false)
                    ->schema([

                        TextInput::make('name')
                            ->label(__('app.field.account_institution_name'))
                            ->required()
                            ->maxLength(255),

                        Select::make('category')
                            ->label(__('app.field.type'))
                            ->options(AccountCategory::options())
                            ->required(),

                        TextInput::make('year')
                            ->label(__('app.field.account_year'))
                            ->integer()
                            ->required()
                            ->minValue(1900)
                            ->maxValue(date('Y')),

                        MoneyInput::make('value')
                            ->label(__('app.field.value'))
                            ->required(),

                    ]),
            ]);
    }
}
