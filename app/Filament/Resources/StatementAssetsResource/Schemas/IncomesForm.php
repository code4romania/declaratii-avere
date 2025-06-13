<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Schemas;

use App\Enums\BeneficiaryType;
use App\Enums\IncomeType;
use App\Forms\Components\MoneyInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Marvinosswald\FilamentInputSelectAffix\TextInputSelectAffix;

class IncomesForm
{
    public static function getSection(): Section
    {
        return Section::make('VII. Venituri ale declarantului şi ale membrilor săi de familie, realizate în ultimul an fiscal încheiat (potrivit art. 41 din Legea nr. 571/2003 privind Codul fiscal, cu modificările şi completările ulterioare)')
            ->schema([
                Repeater::make('incomes')
                    ->relationship('incomes')
                    ->hiddenLabel()
                    ->reorderable(false)
                    ->defaultItems(0)
                    ->schema([
                        TextInputSelectAffix::make('name')
                            ->label(__('app.field.income_beneficiary'))
                            ->required()
                            ->maxLength(255)
                            ->select(
                                Select::make('beneficiary_type')
                                    ->hiddenLabel()
                                    ->options(BeneficiaryType::options())
                                    ->extraAttributes(['class' => 'w-20'])
                                    ->required()
                            ),

                        Select::make('type')
                            ->label(__('app.field.income_type'))
                            ->options(IncomeType::options())
                            ->required(),

                        TextInput::make('source')
                            ->label(__('app.field.income_source'))
                            ->maxLength(255)
                            ->required(),

                        TextInput::make('description')
                            ->label(__('app.field.income_description'))
                            ->maxLength(255)
                            ->required(),

                        MoneyInput::make('value')
                            ->label(__('app.field.income_value'))
                            ->required(),
                    ]),
            ]);
    }
}
